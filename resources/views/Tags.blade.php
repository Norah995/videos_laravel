<!DOCTYPE html>
<html>
<head>
	<title>Tags</title>
	<link href="{{ asset('css/styleTags.css')}}" rel="stylesheet">
</head>
<body>

	<div class="tagsin">

		<div class="vuetagger-list">
	        <span v-for="tag in tags" class="vuetagger-tag">
	          @{{ tag }} <span class="vuetagger-tag-remover" @click="remove(tag)">&times;</span>
	        </span>
	      </div>
			<select v-model="newTag">
				<!-- en este punto se lo puede cambiar por v-bind:value="rol.value" -->
			  <option v-for="rol in rols" v-bind:text="rol.text">
			    @{{ rol.name }}
			  </option>
			</select>
			<span>Modulos: @{{ newTag }}</span>
	      	

	      <input type="text"
	        class="vuetagger-input"
	        v-model="newTag"
	        @keydown.enter="append"
	        @keydown.delete="removeLastTag"
	      />
		<pre>
			@{{ $data }}
		</pre>
		<p>{{ $role->id }} {{ $role->name }}</p>
		<ul>
			@foreach($todo as $item) 
			<li>{{ $item->id.' '.$item->name }}</li>
			@endforeach
		</ul>

		<p>{{ 'primer registro: '.$pri->id.' '.$pri->name }}</p>
		<p>{{ 'ultimo registro: '.$ult->id.' '.$ult->name }}</p>
	</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
<script>
	var vm = new Vue({
		el: ".tagsin",
		created: function() {
			this.getrols();
		},

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
	      	rols: 
	      	[
	        	{ "value": '1' , "nae": "Administrador"},
				/*{ "value": '2' , "text": "Area de Recepcion"},
				{ "value": '3' , "text": "Revision y Validacion"},
				{ "value": '4' , "text": "Area Tecnica"},
				{ "value": '5' , "text": "Jefatura"},
				{ "value": '6' , "text": "Area Legal"},
				{ "value": '7' , "text": "Area de Contabilidad"},
				{ "value": '8' , "text": "Area de Presupuesto"},
				{ "value": '9' , "text": "Area de Tesoreria"},
				{ "value": '10', "text": "Area de Recepcion"},
				{ "value": '11', "text": "Revision"},
				{ "value": '12', "text": "Aprobacion"},
				{ "value": '13', "text": "Calificacion"},
				{ "value": '14', "text": "Legal"},
				{ "value": '15', "text": "Archivo"},
				{ "value": '16', "text": "Prestamos"},
				{ "value": '17', "text": "Juridica"},
				{ "value": '18', "text": "Area de Archivo"},
				{ "value": '19', "text": "Direccion"},
				{ "value": '20', "text": "Direccion"},
				{ "value": '21', "text": "Jefatura"},
				{ "value": '22', "text": "Regional Cochabamba"},
				{ "value": '23', "text": "Regional Santa Cruz"},
				{ "value": '24', "text": "Regional Oruro"},
				{ "value": '25', "text": "Regional Potosi"},
				{ "value": '26', "text": "Regional Sucre"},
				{ "value": '27', "text": "Regional Tarija"},*/
	        ],
	        
	        newTag: '',
	        tags: 
	        [

	        ],
	        
	        
	      }
	    },

		mounted() {
	      this.initialize()
	    },
	    ready() {
	      this.initialize()
	    },

		methods: {
			getrols: function(){
	        	this.get.('/listaro').then( response => {
	        		this.rols = response.data
	        	});
				
			},
	      /**
	       * Initialize the tags
	       */
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

	        /**
	         * Don't allow empty tag.
	         */
	        if (this.newTag.trim() === '') {
	          return false
	        }
	        
	        /**
	         * Don't allow duplicate tags.
	         */
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

	      /**
	       * Remove the selected tag
	       * @param {string} tag  Tag name
	       */
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