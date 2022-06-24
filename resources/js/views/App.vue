<template>
    <div>
        <Header />
        <div id="my-wrapper">
            <!-- jumbo -->



            <Jumbotron />
            <section class="py-5 overflow-hidden bg-primary" id="home" v-show="!isMenuClicked">
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
                                                    <h5>Filtra per una o più categorie:</h5>
                                                    <div class="input-group-icon">
                                                        <div class="form-check mb-2" v-for="(type,index) in cookingTypes" :key="index">
                                                            <input @click="filterRestaurants(type.id)" v-model="selectedCategories" class="form-check-input" name="type" 
                                                            type="checkbox"  :value="type.id" id="flexCheckDefault" >
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                {{type.name}}
                                                            </label>
                                                        </div>
                                                        <router-link :restaurants="getRestaurants" :to="{name: 'restaurants'}">Tutti i ristoranti</router-link> 

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
            
            <router-view :restaurants="getRestaurants"></router-view>

            <section class="footer">
                <div class="container">
                    <div class="row footer-row justify-content-end">
                        <div class="col-6 text-end ">
                            <h1 class="text-white">About Us:</h1> 
                            <ul>
                                <li>
                                    <h2>
                                        Gianfranco Grande
                                    </h2>
                                </li>
                                                                <li>
                                    <h2>
                                        Matteo Anselmo
                                    </h2>
                                </li>
                                                                <li>
                                    <h2>
                                        Viviana Cifarelli
                                    </h2>
                                </li>
                                                                <li>
                                    <h2>
                                        Matteo Lopez
                                    </h2>
                                </li>
                                                                <li>
                                    <h2>
                                        Alessandro Ordetti
                                    </h2>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


            <!-- <Restaurants   @hasClickedMenu="updateJumbo()" /> -->
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
    Main,
},
    data: function(){
        return{
            restaurants: [],
            cookingTypes : [],
            isMenuClicked: false,
            filteredRestaurants : [],
            selectedCategories : [],
        }
    },
    methods:{
        // metodo per effettuare una ricerca filtrata dei ristoranti
        filterRestaurants(value){          
            // verifichiamo se la categoria selezionata è già presente..
            if( this.selectedCategories.includes(value) ) {
                let i = this.selectedCategories.indexOf(value); 
                this.selectedCategories.splice(i, 1 ); // ..la cancelliamo
            } else {
                this.selectedCategories.push(value); // altrimenti la aggiungiamo all'array
            }
            console.log(`Gli id delle categorie selezionate sono: ${this.selectedCategories}`);
            //facciamo una chiamata axios con l'array delle categorie selezionate, se almeno una è stata selezionata
            if (this.selectedCategories.length > 0) {
                axios.get(`http://127.0.0.1:8000/api/filtered_restaurants/${this.selectedCategories}`)
                    .then((result) => {
                        this.filteredRestaurants = result.data;
                    })
                    .catch((error) => {
                        console.warn(error);
                    })
            }
        },
        getSingleRestaurant(){
            axios.get(`http://127.0.0.1:8000/api/users/`)
            .then((result) => {
                this.restaurants = result.data;
            })
            .catch((error) => {
                console.warn(error);
            })
        },
        getCookingTypes(){
            axios.get(`http://127.0.0.1:8000/api/cooking-types`)
            .then((result) => {
                this.cookingTypes = result.data;
                console.log(this.cookingTypes);
            })
            .catch((error) => {
                console.warn(error);
            })
        },
        updateJumbo() {
            this.isMenuClicked = true;
        }
    },
    computed: {
        getRestaurants() {
            if ( this.selectedCategories.length == 0) {
                console.log('ritornano tutti i ristoranti')
                return this.restaurants
            } else {
                console.log('ritornano i ristoranti filtrati')
                return this.filteredRestaurants 
            }
        }
    },
    created(){
        this.getSingleRestaurant();
        this.getCookingTypes()
        // window.localStorage.clear()
    }
}
</script>

<style lang="scss">

.custom-video {
position: absolute;
top: 0;
left: 0;
object-fit: cover;
width: 100%;
height: 100%;
}

ul {
  list-style-type: none;
}

li>h2, .footer h1{
    color: #f75555;
    font-family: 'Source Sans Pro';
}

.footer {
  background-image: url('https://qul.imgix.net/087432a9-1412-4fcf-8df5-a0ebf917cf80/579807_sld.jpg');
  background-size: cover;
  padding-top: 7rem;
  padding-bottom: 7rem;
  position: relative;
  background-repeat: no-repeat;
  height: 700px;
  background-position: bottom;
  font-size: 16px;
    font-weight: 400;
    line-height: 24px;
    color: rgb(33, 37, 41);
    text-align: start;
    font-family: sans-serif;
}

.footer-row {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0;
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(-1 * var(--bs-gutter-y));
  margin-right: 37px;
  margin-left: 37px;
}

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


ul.ks-cboxtags {
    list-style: none;
    padding: 20px;
}
ul.ks-cboxtags li{
  display: inline;
}
ul.ks-cboxtags li label{
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .3);
    color: #adadad;
    border-radius: 25px;
    white-space: nowrap;
    margin: 3px 0px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 2px solid #1bdbf8;
    background-color: #12bbd4;
    color: #fff;
    transition: all .2s;
}

ul.ks-cboxtags li input[type="checkbox"] {
  display: absolute;
}
ul.ks-cboxtags li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.ks-cboxtags li input[type="checkbox"]:focus + label {
  border: 2px solid #e9a1ff;
}
</style>
