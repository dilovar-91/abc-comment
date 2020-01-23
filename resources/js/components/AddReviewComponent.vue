<template>
<div class="review border-default universal-padding mt-30" id="addreview">
                                    <h2 class="review-title mb-30">Написать отзыв</h2>
                                    <p class="review-mini-title">Ваш отзыв</p>
                                    <ul class="review-list">                                       
                                        <li>
                                            <star-rating v-model="rating" :increment="0.5" v-bind:star-size="30" text-class="custom-text"></star-rating>
                                        </li>                                        
                                    </ul>                                    
                                    <div class="riview-field mt-40">
                                        <form autocomplete="off" @submit.prevent="setRating" method="POST">
                                            <div class="form-group">
                                                <label class="req" for="sure-name">Имя</label>
                                                <input type="text" class="form-control" id="sure-name" v-model="review.author" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="subject">Заголовок отзыва</label>
                                                <input type="text" class="form-control" id="subject" v-model="review.title" required="required">
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="req" for="comments">Отзыв</label>
                                                <textarea class="form-control" rows="5" id="comments" required="required" v-model="review.text"></textarea>
                                            </div>
                                            <button type="submit" class="customer-btn">Отправить</button>
                                        </form>
                                    </div>
                                </div>
</template>
<script>
export default{
  props: ['company_id'],
  data(){
     return {
       review: {
                    author: '',
                    text: '',
                    rating: '',
                    company_id: '',
                    review_type: '',
                    title: ''
                },  
      rating: 0,
      author: '',
      text: '',
      review_type: '1',      
      totaluser: 0,
      totalrate: 0,         
    }
  },
  created(){
   
  },  
  methods: {
     setRating(e) {     
      var review = this.review;
      fetch('/api/rating/new', {
      method: 'post',        
        body: JSON.stringify({ company_id:this.company_id, text:review.text, author:review.author, rating:this.rating, title:review.title}),
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         Accept: 'application/json' 
        }
      }).then(res => res.text())
      .then(data => {
       this.$swal('Спасибо!', 'Ваш отзыв успешно сохранен!', 'success');
          this.review.author = "";
          this.review.title = "";
          this.review.text = "";
          this.rating = 0;
      }).catch(err => {
         this.$swal('Ошибка', 'При сохранение отзывов что то пошло не так', 'error');       
      });
    }
  }
}
</script>