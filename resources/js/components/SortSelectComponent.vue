<template>
<div class="main-toolbar-sorter clearfix" id="dynamic_select">
                                <div class="toolbar-sorter d-md-flex align-items-center">
                                    <label>Сортировка {{selected}}:</label>
                                    <select v-model="selected" name="sortd" class="sorter wide" @change="window.location.href = this.value">
                                        <option value="1" selected>Релевантность</option>
                                        <option value="2">Имя, А до Я</option>
                                        <option value="name-desc">Имя, Я до A</option>
                                        <option value="rating">Рейтинг</option>
                                        <option value="comments">Кол-во комментарии</option>
                                    </select>
                                </div>
                            </div>
</template>

<script>
//import { required, email, minLength } from "vuelidate/lib/validators";


export default{
   data(){
     return {     
        selected: 'Релевантность'
    }
  },  
  methods: {
     sortBy: function(e) {  
      var pathArray = location.pathname
      this.selected = e.target.value
      window.location.href = "/?page=1" + '&sort='+this.selected
      console.log(e.target.value)
    },
  }
}
</script>