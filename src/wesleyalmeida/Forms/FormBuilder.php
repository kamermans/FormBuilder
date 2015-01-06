<?php
/**
 * Author: Wesley
 * Date: 06-Jan-15
 * Time: 13:06
 */

namespace Wesleyalmeida\Forms\FormBuilder;

class FormBuilder {

    protected $fields = array();
    protected $labels = array();

    /**
     * @param $name    String
     * @param $element \Illuminate\Html\FormBuilder
     *
     * @return $this Wesleyalmeida\Forms\FormBuilder
     */
    public function addField($name, $element) {
        $this->fields[$name] = $element;

        return $this;
    }

    /**
     * @param $label   String
     * @param $options Array
     *
     * @return $this \Wesleyalmeida\Forms\FormBuilder
     */
    public function addSubmit($label, $options) {
        $element                = Form::submit($label, $options);
        $this->fields['submit'] = $element;

        return $this;
    }

    /**
     * @param $name  String
     * @param $label String
     *
     * @return $this \Wesleyalmeida\Forms\FormBuilder
     */
    public function addLabel($name, $label) {
        $this->labels[$name] = $label;

        return $this;
    }

    /**
     * @param $name  String
     * @param $label String
     * @param $field \Illuminate\Html\FormBuilder
     *
     * @return $this \Wesleyalmeida\Forms\FormBuilder
     */
    public function addLabelField($name, $label, $field) {
        $this->fields[$name] = $field;
        $this->labels[$name] = $label;

        return $this;
    }

    /**
     * @return array
     */
    public function getFields() {
        return $this->fields;
    }

    /**
     * @param $name String
     *
     * @return \Illuminate\Html\FormBuilder
     */
    public function getField($name) {
        return $this->fields[$name];
    }

    /**
     * @return array
     */
    public function getLabels() {
        return $this->labels;
    }

    /**
     * @param $name String
     *
     * @return String
     */
    public function getLabel($name) {
        return $this->labels[$name];
    }

    /**
     * @param $name    String
     * @param $values  Array
     * @param $default Mixed
     *
     * @return mixed
     */
    public function getOldValueFromValues($name, $values, $default = null) {
        $value = array_key_exists($name, $values) ? $values[$name] : $default;

        return $value;
    }

    /**
     * @param array $skip
     *
     * @return array
     *
     * Returns a list of all HTML IDs in the form
     * The $skip array hides the elements in the array
     * from showing up in the form by default.
     *
     * This is useful if you don't want to loop through
     * all the elements, but want to display certain
     * ones in a different way
     */
    public function getFieldIds($skip = []) {
        $fields = $this->getFields();

        $ids = array_keys($fields);

        foreach ($skip as $id) {
            $key = array_search($id, $ids);
            if ($key !== false) {
                unset($ids[$key]);
            }
        }

        return $ids;
    }

    public function getLabelIds() {
        $labels = $this->getLabels();

        $ids = array_keys($labels);

        return $ids;
    }

    public function getFieldAndLabelIds() {
        $fields = $this->getFieldIds();

        $labels = $this->getLabelIds();

        return array('fields' => $fields, 'labels' => $labels);
    }

}