<template>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                {{message}}
                <div class="card-body">

<!--                    <div v-if="products !=null">-->
<!--                        Test hello-->
                        <div v-for="p in products" :key="p.id">
                            <h1>{{p.product_name}}</h1>
                    </div>

                    </div>
                </div>
            </div>

        </div>

<!--</div>-->
</template>

<script>
export default {
    name: "productDetail",
    mounted() {
        console.log('Component mounted.')
    },
    data: function () {
        return {
           products :{
               product_name:"",
           },
            message:"hello"
        }
    },
    methods: {
        fetchAll() {
            console.log('test');
            var $this = this;
            axios.get(`/api/getAllProduct`).then(response => {
                $this.products = response.data;
                console.log(this);
            })


        },

    },
    created() {
        this.fetchAll();
       // this.getProduct();
    }

}
</script>

<style scoped>

</style>
