<template>
    <panel-item :field="field">
        <template slot="value">
            <div class="w-full flex justify-between items-center flex-row" v-if="hasValue">
                <p class="text-90">{{ value }}</p>
                <div class="flex flex-row">
                    <button ref="copyButton" type="button" v-if="showCopyToClipboard" v-tooltip.click="__('Copy')" class="text-70 hover:text-primary mr-3">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M17 7h2.25c.97 0 1.75.78 1.75 1.75v10.5c0 .97-.78 1.75-1.75 1.75H8.75C7.78 21 7 20.22 7 19.25V17H4.75C3.78 17 3 16.22 3 15.25V4.75C3 3.78 3.78 3 4.75 3h10.5c.97 0 1.75.78 1.75 1.75V7zm-2 0V5H5v10h2V8.75C7 7.78 7.78 7 8.75 7H15zM9 9v10h10V9H9z"/>
                        </svg>
                    </button>
                    <button type="button" v-tooltip.click="__('Show')" class="text-70 hover:text-primary" @mousedown="handleMouseDown" @mouseup="handleMouseUp">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <p v-else>&mdash;</p>
        </template>
    </panel-item>
</template>

<script>
import Clipboard from 'clipboard';

export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
    computed: {
        value: function () {
            return this.masked
                ? this.field.value.replace(/./g, '•')
                : this.field.value;
        },
        hasValue: function () {
            return this.field.value !== null && this.field.value !== '';
        },
        showCopyToClipboard: function () {
            return !!this.field.showCopyToClipboard;
        },
    },
    mounted() {
        if (this.$refs.copyButton) {
            const clipboardEl = new Clipboard(this.$refs.copyButton, {
                text: () => this.field.value,
                action: () => 'copy'
            });
    
            clipboardEl.on('success', (e) => {
                this.$toasted.show(this.__('Copied!'), { type: 'success' });
            });

            clipboardEl.on('error', () => {
                this.$toasted.show(this.__('Error occured while copying!'), { type: 'error' });
            });

            this.clipboardEl = clipboardEl;
        }
    },
    destroyed() {
        if (this.clipboardEl) {
            this.clipboardEl.destroy();
        }
    },
    data: function () {
        return {
            masked: true,
            clipboardEl: null,
        };
    },
    methods: {
        handleMouseDown: function () {
            this.masked = false;
        },
        handleMouseUp: function () {
            this.masked = true;
        },
    },
}
</script>
