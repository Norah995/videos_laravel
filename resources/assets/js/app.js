
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));


 new Vue({
    el: ".tagsin",
    data: {
      props: {
          value: {
            type: Array,
            default: ''
          },
          pattern: {
            type: String,
            default: null
          }
        },
    },

    data() {
        return {
          newTag: '',
          tags: []
        }
      },

    mounted() {
        this.initialize()
      },
      ready() {
        this.initialize()
      },

    methods: {
        initialize() {
          const initialTags = this.value
          initialTags.forEach((tag) => {
            this.tags.push(tag)
          })
        },
        /**
         * Append new tag
         */
        append() {
          //vacio nuevo tag
          if (this.newTag.trim() === '') {
            return false
          }
          //para que n haya duplicado
          let duplicate = false
          this.tags.forEach((tag) => {
            if (tag === this.newTag.trim()) {
              duplicate = true
            }
          })
          if (duplicate) return false
          /**
           * Check new tag with regex pattern
           */
          const regex = new RegExp(this.pattern)
          if (this.pattern && ! regex.test(this.newTag)) {
            return false
          }
          /**
           * Everything looks good, let's add new tag.
           */
          this.tags.push(this.newTag.trim())
          this.newTag = ''
          this.$emit('change', this.tags)
        },
        //elimina tag seleccionado
        remove(tag) {
          const index = this.tags.indexOf(tag)
          this.tags.splice(index, 1)
          this.$emit('change', this.tags)
        },
        /**
         * Remove the last tag
         */
        removeLastTag() {
          if (this.newTag === '' && this.tags.length > 0) {
            this.tags.pop()
            this.$emit('change', this.tags)
          }
        }
      }
  
    
  })
