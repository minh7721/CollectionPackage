<?php

if (!interface_exists('JsonSerializable')) {
    interface JsonSerializable
    {
        /**
         * Implements how the array should be serialized.
         *
         * @return mixed
         */
        public function jsonSerialize();
    }
}