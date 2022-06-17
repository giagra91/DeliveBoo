<template>
    <div class="container">
        <!-- <div class="card" v-for="(restaurant, index) in restaurants" :key="index">
            <img class="card-img-top w-25" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
            <div class="card-body">
                <h5 class="card-title">{{restaurant.name}}</h5>
                <p class="card-text">{{restaurant.address}}</p>
                <p class="card-text">{{restaurant.vat_number}}</p>
                <p class="card-text">{{restaurant.email}}</p>


            </div>
        </div> -->



        <div class="row m-4">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4" v-for="(restaurant, index) in restaurants" :key="index">
                <div class="card text-white card-has-bg click-col" v-bind:style="{ 'background-image': 'url(' + restaurant.logo + ')' }">
                    <img class="card-img d-none" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="card-body">
                            <small class="card-meta mb-2">{{restaurant.vat_number}}</small>
                            <h4 class="card-title mt-0 "><a class="text-white" herf="#">{{restaurant.name}}</a></h4>
                            <small><i class="far fa-clock"></i> {{restaurant.email}}</small>
                        </div>
                        <div class="card-footer">
                            <div class="media">
                                <img class="mr-3 rounded-circle" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name" style="max-width:50px">
                                <div class="media-body">
                                    <h6 class="my-0 text-white d-block">{{restaurant.address}}</h6>
                                    <!-- <small>Director of UI/UX</small> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    data: function(){
        return{
            restaurants: [],
        }
    },
    methods:{
        getRestaurants(){
            axios.get("http://127.0.0.1:8000/api/users")
            .then((result) => {
                console.log(result.data);
                this.restaurants = result.data;
            })
            .catch((error) => {
                console.warn(error);
            })
        },
        // getImage(image){
        //     return `url(${require(`../${image}`)})`;
        // }
    },
    created(){
        this.getRestaurants();
    }
}
</script>

<style lang="scss" scoped >
.wrapper{margin:10vh}
//post card styles

.card{
border: none;
transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
overflow:hidden;
border-radius:20px;
min-height:450px;
box-shadow: 0 0 12px 0 rgba(0,0,0,0.2);

@media (max-width: 768px) {
min-height:350px;
}

@media (max-width: 420px) {
min-height:300px;
}

&.card-has-bg{
transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
background-size:120%;
background-repeat:no-repeat;
background-position: center center;
&:before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: inherit;
    -webkit-filter: grayscale(1);
-moz-filter: grayscale(100%);
-ms-filter: grayscale(100%);
-o-filter: grayscale(100%);
filter: grayscale(100%);}

&:hover {
    transform: scale(0.98);
    box-shadow: 0 0 5px -2px rgba(0,0,0,0.3);
    background-size:130%;
    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

    .card-img-overlay {
    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
    background: rgb(35,79,109);
    background: linear-gradient(0deg, rgba(4,69,114,0.5) 0%, rgba(4,69,114,1) 100%);
    }
}
}
.card-footer{
background: none;
border-top: none;
    .media{
    img{
    border:solid 3px rgba(255,255,255,0.3);
    }
}
}
.card-meta{color:#26BD75}
.card-body{
transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
}
&:hover {
.card-body{
    margin-top:30px;
    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
}
cursor: pointer;
transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
}
.card-img-overlay {
transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
background: rgb(35,79,109);
background: linear-gradient(0deg, rgba(35,79,109,0.3785889355742297) 0%, rgba(69,95,113,1) 100%);
}
}
@media (max-width: 767px){

}
</style>
