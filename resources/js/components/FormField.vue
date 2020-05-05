<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div class="w-full flex flex-row items-center">
                <input
                    :id="field.name"
                    :type="inputType"
                    :dusk="field.attribute"
                    class="w-full form-control form-input form-input-bordered mr-3"
                    :class="errorClasses"
                    :placeholder="field.name"
                    v-model="value"
                    :disabled="isReadonly"
                />
                <button v-tooltip.click="__('Show')" class="text-70 hover:text-primary" type="button" @mousedown="handleMouseDown" @mouseup="handleMouseUp">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    </svg>
                </button>
            </div>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    created() {
        console.log(this.$root);
    },

    computed: {
        inputType: function () {
            return this.masked ? 'password' : 'text';
        },
    },

    data() {
        return {
            value: this.field.value || '',
            masked: true,
        };
    },

    methods: {
        handleInputChange(event) {
            this.value = event.target.value;
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },

        handleMouseDown() {
            this.masked = false;
        },
        handleMouseUp() {
            this.masked = true;
        }
    },
}
</script>
