Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-secret-field', require('./components/IndexField'))
  Vue.component('detail-nova-secret-field', require('./components/DetailField'))
  Vue.component('form-nova-secret-field', require('./components/FormField'))
})
