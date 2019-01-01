<template>
  <div class="container-fluid mb-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">Komentarze {{comments.length}}</div>

          <div class="card-body" v-for="(item, index) in comments" :key="index">
            <p class="text-right mb-0">{{item.created_at}}</p>
            <a href data-toggle="tooltip" :title="item.user.name">
              <img :src="'/storage/'+item.user.avatar" alt class="mr-3 image">
            </a>
            {{item.comment}}
          </div>
          <hr>

          <div class="card-body">
            Napisz swuj komentarz:
            <textarea rows="10" v-model="body" class="w-100"></textarea>
            <a class="btn btn-primary" @click="setComments()" role="button">Dodaj</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      comments: [],
      body:""
    };
  },
  props: {
    page: String
  },
  methods: {
    getComments() {
      var on = this;
      axios
        .get(window.location.origin + "/commets/getcommets", {
          params: {
            id: this.page
          }
        })
        .then(function(response) {
          on.comments = response.data;
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    setComments(){
        var on = this;
        if(this.isEmptyOrSpaces(this.body)){
            alert("brak komentarza");
            return;
        }
        axios
            .post(window.location.origin + "/commets/setcommets", 
                {
                    page: this.page,
                    body:this.body
                }
            )
            .then(function(response) {
                if(response.data.error){
                    alert(response.data.error);
                    on.body ="";
                    return;
                }
                on.getComments();
                on.body ="";
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    isEmptyOrSpaces(str){
        return str === null || str.match(/^ *$/) !== null;
    }
  },
  mounted() {
      this.getComments();
  }
};
</script>

<style lang="scss" scoped>
.image {
  height: 50px;
  width: 50px;
}
</style>
