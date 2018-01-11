<!DOCTYPE html>
<html>
<head>
  <title>Prueba 2</title>
  <link href="{{ asset('css/stylee.css')}}" rel="stylesheet">
</head>
<body>

  <div class="tagsin">
    <div class="vuetagger-list">
          <span v-for="tag in tags" class="vuetagger-tag">
            @{{ tag }} <span class="vuetagger-tag-remover" @click="remove(tag)">&times;</span>
          </span>
        </div>

        <input type="email"
          class="vuetagger-input"
          v-model="newTag"
          @keydown.enter="append"
          @keydown.delete="removeLastTag"
        />
  </div>


</body>
<script type="text/javascript" src="https://unpkg.com/vue@2.1.8/dist/vue.js"></script>
<script>
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

</script>

</html>
