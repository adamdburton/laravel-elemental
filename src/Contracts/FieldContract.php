<?php

namespace Click\Elemental\Contracts;

interface FieldContract
{
    /**
     * @return string
     */
    public function getDisplayName();

    /**
     * @return string
     */
    public function getPropertyType();

    /**
     * @return array
     */
    public function getSettings();
}