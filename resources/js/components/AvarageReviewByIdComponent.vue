
<template>
 <div class="row">
 <div class="col-md-4">
 <star-rating  :rating="this.totalrate" :star-size="20" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating> 
 </div>
 <div class="col-md-6 font-weight-bold pt-1">({{this.totaluser}})</div>
 </div>
 </template>
 

<style>
/* Star Rating */

.fa-star {
    font-size: 25px;
}

</style>

<script>

export default{
    props: ['company_id'],
  data(){
    return {
    totalrate: 0,
    totaluser: 0
    }
  },
  created(){
  
    this.getRating();
  },
  methods: {    
      getRating(){
      fetch('/api/rating/'+ this.company_id)
      .then(res => res.json())
      .then(res => {
        var mydata = res.data;
        this.totaluser = mydata.length;
        var sum = 0;
        for(var i = 0; i < mydata.length; i++){
          sum += parseFloat(mydata[i]['rating']);
        }
        var avg = sum/mydata.length
        this.totalrate = parseFloat(avg.toFixed(1));
        this.totalrate = this.totalrate || 0;
        
      })
      .catch(err => {
        console.log(err);
      });
    }
    
    
  }
}
</script>