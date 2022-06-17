<template>
    <div class="container">
        <Header />
        <Jumbotron />
        <div class="row m-4">
            <div class="input-group-icon pe-2 m-4">
                <i class="fas fa-search input-box-icon text-primary"></i>
                <input class="form-control border-0 input-box bg-100 p-3" type="search" placeholder="Search Food" aria-label="Search" />
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4" v-for="(restaurant, index) in restaurants" :key="index">
                <div class="card text-white card-has-bg click-col" v-bind:style="{ 'background-image': 'url(' + restaurant.logo + ')' }">
                    <img class="card-img d-none" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="card-body">
                            <small class="card-meta mb-2">p. iva: {{restaurant.vat_number}}</small>
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
            <div class="col-12 d-flex justify-content-center mt-5">
                <a class="btn btn-lg btn-primary" href="#!">View All </a>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Jumbotron from '../components/Jumbotron.vue';
export default {
    name: "App",
    components: {
        Header,
        Jumbotron
    },
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

.btn-primary{
    background-color: #FFB30E !important;
    border-color: #FFB30E !important;
}
div.input-group-icon{
    border-radius: 10px;
    input{
        border-radius: 10px;
        background-color: #d6d3287a;
    }
    input::placeholder {
            text-align: center;
        }

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
