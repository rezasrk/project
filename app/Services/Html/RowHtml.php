<?php


namespace App\Services\Html;

class RowHtml
{
    /**
     * @var string
     */
    protected $html;

    /**
     * @param array $attributes
     * @return string
     */
    protected function getAttribute(array $attributes = [])
    {
        if (is_array($attributes) && count($attributes) > 0) {
            $attr = '';
            foreach ($attributes as $key => $value) {
                $attr .= $key . '="' . $value . '" ';
            }
            return $attr;
        }
    }

    /**
     * Create tag <a>
     *
     * @param null $innerHtml
     * @param array $attributes
     * @return $this
     */
    public function a(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <a {$attr}>{$innerHtml}</a> ";

        return $this;
    }

    /**
     * @param array $attributes
     * @param string $innerHtml
     * @return $this
     */
    public function i(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <i {$attr}>{$innerHtml}</i> ";

        return $this;
    }

    /**
     * @param array $attributes
     * @param string $innerHtml
     * @return $this
     */
    public function startSpan(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <span {$attr}>{$innerHtml}";

        return $this;
    }

    /**
     * @param string $afterHtml
     * @return $this
     */
    public function endSpan($afterHtml = '')
    {
        $this->html .= "</span>{$afterHtml}";

        return $this;
    }

    /**
     * @param array $attributes
     * @param string $innerHtml
     * @return $this
     */
    public function startA(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <a {$attr}>{$innerHtml}";

        return $this;
    }

    /**
     * @return $this
     */
    public function endA()
    {
        $this->html .= " </a>";

        return $this;
    }

    /**
     * @param array $attributes
     * @param string $innerHtml
     * @return $this
     */
    public function startUl(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <ul {$attr}>{$innerHtml}";

        return $this;
    }

    /**
     * @return $this
     */
    public function endUl()
    {
        $this->html .= " </ul>";

        return $this;
    }

    /**
     * @param array $attributes
     * @param string $innerHtml
     * @return $this
     */
    public function startLi(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <li {$attr}>{$innerHtml}";

        return $this;
    }

    public function endLi()
    {
        $this->html .= " </li>";

        return $this;
    }

    public function startDiv(array $attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <div {$attr}> ";

        return $this;
    }

    public function br(array $attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <br {$attr}> ";

        return $this;
    }

    public function startForm(array $attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <form {$attr}> ";

        return $this;
    }

    public function endForm()
    {
        $this->html .= " </form> ";

        return $this;
    }

    public function patch()
    {
        $this->html .= method_field('patch');

        return $this;
    }

    public function button(array $attributes = [], string $innerHtml = '')
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <button {$attr}>{$innerHtml}</button> ";

        return $this;
    }

    public function endDiv(string $afterHtml = '')
    {
        $this->html .= "</div>{$afterHtml}";

        return $this;
    }

    public function input($type, array $attributes = [])
    {
        $attr = $this->getAttribute($this->addAttributes(['class' => 'form-control', 'autocomplete' => 'off'], $attributes));

        $this->html .= " <input type='{$type}' {$attr} > ";

        return $this;
    }

    public function checkbox(array $attributes = [], $checked = 0)
    {
        $attr = $this->getAttribute($attributes);

        $chk = $checked ? 'checked' : '';

        $this->html .= " <input type='checkbox' {$attr} {$chk}> ";

        return $this;
    }

    public function label($innerHtml, array $attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <label {$attr}>$innerHtml</label> ";

        return $this;
    }

    public function select(array $options, array $attributes = [], $selected = null)
    {
        $html = $this->option('', 'انتخاب نمایید...');
        collect($options)->each(function ($innerHtml, $value) use (&$html, $selected) {
            if(is_array($selected)){
                $html .= $this->option($value, $innerHtml, in_array($value,$selected) ? 'selected' : '');
            }else{
                $html .= $this->option($value, $innerHtml, $value == $selected ? 'selected' : '');
            }

        });

        $attr = $this->getAttribute($attributes);

        $this->html .= "<select {$attr}>{$html}</select>";

        return $this;
    }

    public function startTable($attributes)
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <table {$attr}> ";

        return $this;
    }

    public function endTable()
    {
        $this->html .= "</table>";

        return $this;
    }

    public function startTbody($attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= "<tbody {$attr}>";

        return $this;
    }

    public function endTbody()
    {
        $this->html .= "</tbody>";

        return $this;
    }

    public function startTr($attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <tr {$attr}> ";

        return $this;
    }

    public function endTr()
    {
        $this->html .= "</tr>";

        return $this;
    }

    public function startTd($innerHtml = '', $attributes = [])
    {
        $attr = $this->getAttribute($attributes);

        $this->html .= " <td {$attr}> {$innerHtml}";

        return $this;
    }

    public function endTd()
    {
        $this->html .= "</td>";

        return $this;
    }

    protected function option(string $value = null, string $innerHtml = '', $selected = null)
    {
        return "<option {$selected} value='{$value}'>{$innerHtml}</option>";
    }

    protected function addAttributes($defaultAttributes, $attributes)
    {
        return array_merge($defaultAttributes, $attributes);
    }

    /**
     * Terminate html
     *
     * @return mixed
     */
    public function getHtml()
    {
        $html = $this->html;
        $this->html = '';
        return $html;
    }
}
