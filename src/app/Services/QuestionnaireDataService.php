<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\{Questionnaire, QuestionnaireOption, QuestionnaireAnswer};

final class QuestionnaireDataService
{
    /**
     * @var bool
     */
    private $questionnaireExists;
    private $questionnaireSelectiveTypeExists;

    /**
     * @var int
     */
    private $authId;

    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $questionnairePrimaryId;

    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $questionnaires;

    public function __construct($authId)
    {
        $this->authId = $authId;
        $this->questionnaireExists =  Questionnaire::where('user_id', $this->authId)->exists();
        $this->questionnaires = Questionnaire::where('user_id', $this->authId)->get();
    }

    /**
     * @return Illuminate\Database\Eloquent\Collection
     */

    private function getOnlySelectionType()
    {
        $singleSelectionType = 1;
        $multipleSelectionType = 2;

        if (
            $this->questionnairePrimaryId = Questionnaire::where('user_id', $this->authId)
                ->where(function($query) use($singleSelectionType, $multipleSelectionType) {
                    $query->where('type', $singleSelectionType)
                        ->orWhere('type', $multipleSelectionType);
                })->exists()
        ) {
            $this->questionnairePrimaryId = Questionnaire::where('user_id', $this->authId)
            ->where(function($query) use($singleSelectionType, $multipleSelectionType) {
                $query->where('type', $singleSelectionType)
                ->orWhere('type', $multipleSelectionType);
            })->pluck('id');

            return $this->questionnaireSelectiveTypeExists = true;
        }
        return $this->questionnaireSelectiveTypeExists = false;
    }

    /**
     * @return Illuminate\Database\Eloquent\Collection
     */
    private function getQuestionnaireOptions()
    {
        if ($this->getOnlySelectionType()) {
            foreach ($this->questionnairePrimaryId as $id){
                $questionnaireOptions[$id] = QuestionnaireOption::where('questionnaire_id', $id)->pluck('option');
            }
            return $questionnaireOptions;
        }
        return [];
    }

    /**
     * @param int
     *
     * @return array
     */
    public function getQuestionnaireAnswers(int $customerId): array
    {
        if ($this->questionnaireExists) {
            $answers = QuestionnaireAnswer::where('customer_id', $customerId)->get();
            $answerList = [];
            foreach ($this->questionnaires as $questionnaire) {
                foreach ($answers as $answer) {
                    if ($questionnaire->id === $answer->questionnaire_id) {
                        $answerList = [
                            'question' => $questionnaire->item,
                            'answer' => $answer->answer
                        ];
                    }
                }
            }
            return $answerList;
        }
        return [];
    }

    /**
     * @return array
     */
    public function questionnaireDataList(): array
    {
        if ($this->questionnaireExists) {
            foreach ($this->questionnaires as $questionnaire) {
                $questionnaireData[$questionnaire->id] = [
                    'item' => $questionnaire->item,
                    'type' => $questionnaire->type,
                    'options' =>[]
                ];
                foreach ($this->getQuestionnaireOptions() as $id => $option) {
                    if ($questionnaire->id === $id){
                        $questionnaireData[$id]['options'] = $option;
                    }
                }
            }
            return ['questionnaireList' => $questionnaireData];
        }
        return [];
    }
}
