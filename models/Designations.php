<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%designations}}".
 *
 * @property int $id
 * @property string $designation_name
 * @property int $status
 *
 * @property EmployeeDetails[] $employeeDetails
 */
class Designations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%designations}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designation_name', 'status'], 'required'],
            [['status'], 'integer'],
            [['designation_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'designation_name' => Yii::t('app', 'Designation Name'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeDetails()
    {
        return $this->hasMany(EmployeeDetails::className(), ['designation' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DesignationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DesignationsQuery(get_called_class());
    }
}
