<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%employee_details}}".
 *
 * @property int $id
 * @property int $emplyoee_id
 * @property int $designation
 * @property string $salary
 *
 * @property Employee $emplyoee
 * @property Designations $designation0
 */
class EmployeeDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employee_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emplyoee_id', 'designation', 'salary'], 'required'],
            [['emplyoee_id', 'designation'], 'integer'],
            [['salary'], 'string', 'max' => 100],
            [['emplyoee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['emplyoee_id' => 'id']],
            [['designation'], 'exist', 'skipOnError' => true, 'targetClass' => Designations::className(), 'targetAttribute' => ['designation' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'emplyoee_id' => Yii::t('app', 'Emplyoee ID'),
            'designation' => Yii::t('app', 'Designation'),
            'salary' => Yii::t('app', 'Salary'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmplyoee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'emplyoee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignation0()
    {
        return $this->hasOne(Designations::className(), ['id' => 'designation']);
    }

    /**
     * @inheritdoc
     * @return EmployeeDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeDetailsQuery(get_called_class());
    }
}
