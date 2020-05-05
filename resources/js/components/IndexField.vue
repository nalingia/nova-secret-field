<template>
    <div class="flex flex-row justify-between items-center w-full" v-if="hasValue">
        <span class="mr-3">{{ value }}</span>
        <button v-tooltip.click="__('Show')" type="button" class="text-70 hover:text-primary" @mousedown="handleMouseDown" @mouseup="handleMouseUp">
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            </svg>
        </button>
    </div>
    <p v-else>&mdash;</p>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    computed: {
        value: function () {
            return this.masked
                ? this.field.value.replace(/./g, '•')
                : this.field.value;
        },
        hasValue: function () {
            return this.field.value !== null && this.field.value !== '';
        }
    },
    data: function () {
        return {
            masked: true,
        };
    },
    methods: {
        handleMouseDown: function () {
            this.masked = false;
        },
        handleMouseUp: function () {
            this.masked = true;
        },
    }
}
</script>
