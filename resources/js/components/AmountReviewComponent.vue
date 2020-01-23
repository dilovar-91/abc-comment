<template>
<div class="inner-box short-info">
<h2 class="desc-title">Общая оценка <star-rating :inline="true" :read-only="true" :show-rating="false" v-model="totalrate" :increment="0.1"  :star-size="20" ></star-rating>  ({{ this.totaluser }} отзывов)</h2>
<div class="col-xs-12 col-md-9">

<div class="row">  
  <div class="side">
    <div class="font-weight-bold">5 </div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>{{this.review5_count}}</div>
  </div>
  <div class="side">
   <div class="font-weight-bold">4 </div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
   <div>{{this.review4_count}}</div>
  </div>
  <div class="side">
   <div class="font-weight-bold">3 </div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
   <div>{{this.review3_count}}</div>
  </div>
  <div class="side">
    <div class="font-weight-bold">2 </div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
   <div>{{this.review2_count}}</div>
  </div>
  <div class="side">
   <div class="font-weight-bold">1 </div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
     <div>{{this.review1_count}}</div>
  </div>

 
                                      <div>
                                        <span class="fa fa-user">
                                        </span>
                                       
                                      </div>                      
</div>                       
</div>                       
</div> 
</template>

<style scoped>
.info_dealer {
    padding: 0;
    margin: 0;
    font-size: 16px;
    line-height: 30px;
    float: left;
    color: #12a4dd;;
    font-weight: 400;
}



.dealer_pic {
    border: 30px white solid !important;
}

.side {
    float: left;
    width: 13%;
    margin-top: 10px;
  }
  
  .middle {
    float: left;
    width: 70%;
    margin-top: 10px;
  }
  
  /* Place text to the right */
  .right {
    text-align: right;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* The bar container */
  .bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
  }

  .star-gold{
      color: #ff9800;
  }
  
  /* Individual bars */
  .bar-5 {width: 100%; height: 18px; background-color: #4CAF50;}
  .bar-4 {width: 100%; height: 18px; background-color: #2196F3;}
  .bar-3 {width: 100%; height: 18px; background-color: #00bcd4;}
  .bar-2 {width: 100%; height: 18px; background-color: #ff9800;}
  .bar-1 {width: 100%; height: 18px; background-color: #f44336;}
  
  /* Responsive layout - make the columns stack on top of each other instead of next to each other */
  @media (max-width: 400px) {
    .side, .middle {
      width: 100%;
    }
    /* Hide the right column on small screens */
    .right {
      display: none;
    }
  }
</style>


<script>

export default{
props: ['dealer_id'],
  data(){
      
    return {
      
      rating: 0,
      author: 'Admin',
      text: '',
      review_type: '1',
     
      totaluser: 0,
      totalrate: 0,
      review1_count:0,
      review2_count:0,
      review3_count:0,
      review4_count:0,
      review5_count:0,

    }
  },
  created(){
  
    this.getRating();
  },
  methods: {
    
      getRating(){
      var pathArray = location.pathname.split('/');
      var uid = pathArray[2];
      fetch('/api/rating/'+this.dealer_id)
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
        var bar1 = 0;
        var bar2 = 0;
        var bar3 = 0;
        var bar4 = 0;
        var bar5 = 0;
       
        for(var j = 0; j < mydata.length; j++){
          if(parseInt(mydata[j]['rating']) >= '0.5' && parseInt(mydata[j]['rating']) < '2'){
            bar1 += 1
            this.review1_count++
          }
          if(parseInt(mydata[j]['rating']) >= '2' && parseInt(mydata[j]['rating']) < '3'){
            bar2 += 1
             this.review2_count++
          }
          if(parseInt(mydata[j]['rating']) >= '3' && parseInt(mydata[j]['rating']) < '4'){
            bar3 += 1
            this.review3_count++
          }
          if(parseInt(mydata[j]['rating']) >= '4' && parseInt(mydata[j]['rating']) < '5'){
            bar4 += 1
             this.review4_count++
          }
          if(parseInt(mydata[j]['rating']) >= '5'){
            bar5 += 1;
            this.review5_count++
          }
        }
        $('.bar-5').css('width', bar5+'%');
        $('.bar-4').css('width', bar4+'%');
        $('.bar-3').css('width', bar3+'%');
        $('.bar-2').css('width', bar2+'%');
        $('.bar-1').css('width', bar1+'%');
      })
      .catch(err => {
        console.log(err);
      });
    },
    showCurrentRating: function(rating) {
      this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " + rating + " stars"
    }
    
  }
}
</script>