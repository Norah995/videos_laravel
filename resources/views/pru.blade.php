<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>holavue</title>
  </head>
  <body>

<div id="app" class="container">
  <div class="columns is-mobile">
    
    <div class="column">
      <h4 class="title is-4">prueba</h4>

    
      <label class="label">Tags</label>
      <tag-input v-model="product.tags" class="input"></tag-input>
      <tag-list v-model="product.tags" style="padding: 5px 0"></tag-list>

      <input-tag placeholder="Add Tag" :tags="tags"></input-tag>
      <input-tag :on-change="callbackMethod" :tags="tagsArray"></input-tag>

    </div>

    
  </div>
</div>
</body>
<script type="text/javascript" src="https://unpkg.com/vue@2.1.8/dist/vue.js"></script>
  <script type="text/javascript">
  
    Vue.component('tag-input', {
  template: '<input type="text" v-model="editableTags">',
  props: ['value'],
  computed: {
    editableTags: {
      get () {
        return this.value.join(' ')
      },
      set (val) {
        this.$emit('input', val.split(' '))
      }
    }
  }
})

Vue.component('tag-list', {
  template: `<div>
  <span v-for="tag, index in value" class="tag is-info" style="margin-right: 2px">
    {{tag}}
    <button class="delete is-small" @click="remove(index)"></button>
  </span>
</div>`,
  props: ['value'],
  methods: {
    remove (index) {
      var clonedValue = this.value.slice()
      clonedValue.splice(index, 1)
      this.$emit('input', clonedValue)
    }
  }
})

new Vue({
  el: '#app',
  
  data: {
    product: {
      tags: ['']
    }
  }
})
  </script>


 
</html>