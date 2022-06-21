<template>
    <div >
        <Header />
        <Jumbotron />
        <!-- <div v-for="(element, index) in navItems" :key="index">
            <router-link class="nav-link active" :to=" { name: element.routeName,  }">{{element.label}}</router-link>
        </div> -->
        <Main />
        <section class="py-5 overflow-hidden bg-primary" id="home">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="../../../public/img/logo-deliveboo/gallery/hero-header.png" alt="hero-header" /></a></div>
                        <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                            <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Hai fame?</h1>
                            <h1 class="text-800 mb-5 fs-4">Con pochi e semplici click, ti sazierai!!<br class="d-none d-xxl-block" /></h1>
                            <div class="card w-xxl-75">
                            <div class="card-body">
                                <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery</button>
                                </div>
                                </nav>
                                <div class="tab-content mt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form class="row gx-2 gy-2 align-items-center">
                                        <div class="col">
                                            <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                                <select class="form-select" aria-label="Default select example" v-model='selectedItem' @change="getSingleRestaurant()">
                                                    <option value=" ">Tutti i Ristoranti</option>
                                                    <option value="1">Giapponese</option>
                                                    <option value="2">Cinese</option>
                                                    <option value="3">Indiano</option>
                                                    <option value="4">Pesce</option>
                                                    <option value="5">Carne</option>
                                                    <option value="6">Pizza</option>
                                                    <option value="7">Italiano</option>
                                                    <option value="8">Messicano</option>
                                                    <option value="10">Fusion</option>
                                                    <option value="11">Gourmet</option>
                                                    <option value="12">Greco</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row m-4" id="allRestaurants">

                <div v-for="(restaurant, index) in restaurants" :key="index" class="col-sm-12 col-md-6 col-lg-4 mb-4" >
                    <div class="card text-white card-has-bg click-col" v-bind:style="{ 'background-image': 'url(' + restaurant.logo + ')' }">
                        <p>{{selectedItem}}</p>
                        <img class="card-img d-none" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <small class="card-meta mb-2">p. iva: {{restaurant.vat_number}}</small>
                                <a href="#" class="text-decoration-none">
                                    <h4 class="card-title mt-0 "><button class="text-white" @click="test(restaurant.id)">{{restaurant.name}}</button></h4>

                                </a>
                                <small><i class="far fa-clock"></i> {{restaurant.email}}</small>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <img class="mr-3 rounded-circle" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name" style="max-width:50px">
                                    <div class="media-body">
                                        <h6 class="my-0 text-white d-block">{{restaurant.address}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-4 d-none" id="singleRestaurant" >
                <div >
                <p>{{restaurantMenu.name}}</p>

                <div v-for="(food, index) in restaurantMenu.food_items" :key="index">
                    <p>{{food.name}}</p>
                    <p>{{food.description}}</p>
                </div>
                </div>
                <button @click="checkDisplay()">change</button>
            </div>
        </div>


            
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Jumbotron from '../components/Jumbotron.vue';
import Main from '../components/Main.vue';


export default {
    name: "App",
    components: {
        Header,
        Jumbotron,
        Main
    },
    data: function(){
        return{
            restaurants: [],
            check : false,
            restaurantMenu : [],
            selectedItem: " ",
            navItems:[
                {
                    label: "Restaurants",
                    routeName : "restaurants"
                },
                {
                    label: "Restaurant",
                    routeName : "restaurant"
                },
            ],
            
            
        }
    },
    methods:{
        getSingleRestaurant(){
            if(this.selectedItem !== " "){
                axios.get(`http://127.0.0.1:8000/api/users/${this.selectedItem}`)
                .then((result) => {
                    console.log(result.data.results.users);
                    this.restaurants = result.data.results.users;
                })
                .catch((error) => {
                    console.warn(error);
                })
            }
            else {
                axios.get(`http://127.0.0.1:8000/api/users/`)
                .then((result) => {
                    this.restaurants = result.data;
                    console.log(result.data)
                })
                .catch((error) => {
                    console.warn(error);
                })
            }
        },
        test(id){
            this.restaurantMenu = [];
            axios.get(`http://127.0.0.1:8000/api/users/`)
                .then((result) => {
                    this.restaurantMenu = result.data[id - 1];
                    console.log(this.restaurantMenu)
                })
                .catch((error) => {
                    console.warn(error);
                })
                this.checkDisplay();
        },
        checkDisplay(){
            let allRestaurants = document.getElementById("allRestaurants");
            let singleRestaurant = document.getElementById("singleRestaurant");
            allRestaurants.classList.toggle("d-none");
            singleRestaurant.classList.toggle("d-none");
        }
    },
    created(){
        this.getSingleRestaurant();
    }
}
</script>

<style lang="scss">

.btn-primary{
    background-color: #FFB30E !important;
    border-color: #FFB30E !important;
}
.bg-primary{
    background-color: #FFB30E !important;
}


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
    background: rgb(146, 117, 36);
    background: linear-gradient(0deg, rgba(103, 114, 4, 0.5) 0%, rgb(187, 59, 20) 100%);
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
.card-meta{color:#bd2626}
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
background: rgb(165, 179, 44);
background: linear-gradient(0deg, rgba(165, 48, 19, 0.379) 0%, rgb(189, 177, 68) 100%);
}
}
@media (max-width: 767px){

}
</style>
