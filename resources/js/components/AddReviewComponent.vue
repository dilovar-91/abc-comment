<template>
<div class="ratting-form-wrapper fix" id="addreview">
                                        <h3>Добавить отзыв</h3>
                                        <form @submit.prevent="setRating" method="POST">
                                            <div class="ratting-form row">
                                                <div class="col-12 mb-15">
                                                    <h5>Рейтинг:</h5>
                                                    <div class="ratting-star fix">
                                                      <star-rating v-model="rating" :increment="0.5" v-bind:star-size="30" text-class="custom-text"></star-rating>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="name">Ваше имя:</label>
                                                    <input id="name" placeholder="Имя" type="text" v-model="review.author" required="required">
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="name">Заголовок:</label>
                                                    <input id="title" placeholder="Заголовок отзыва" type="text" v-model="review.title" required="required">
                                                </div>                                                
                                                <div class="col-12 mb-15">
                                                    <label for="your-review">Ваш отзыв:</label>
                                                    <textarea name="review" id="your-review"
                                                    placeholder="Напишите ваш отзыв" required="required" v-model="review.text"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <input value="Добавить отзыв" type="submit">
                                                </div>
                                            </div>
                                        </form>
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