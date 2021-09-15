<script type="text/javascript">
    $_accept();
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[2].classList.add("active");
    let stock = new Vue({
        el:".mainpg",
        data:{
            stocks:[],
            currency:{
                riel:"៛",
                usd:"$",
                bath:"បាត"
            },
            params:{
                num:false,
                value:'',
                date:false,
                from:'',
                to:'',
            },
            search_mode:"ids",
            keyword:"",
            sorts:"date,desc",
            count:{
                is:'on',
                count: '',
                date: "<?php echo date("Y-m-d"); ?>",
                item_id:0
            }
        },
        watch:{
            keyword:{
                handler(){
                    let nis1 = this;
                    clearTimeout(this.timer);
                    this.timer = setTimeout(function (){
                        if (nis1.keyword === ''){
                            nis1.load();
                        }else {
                            nis1.search();
                        }
                    },300);
                }
            },
            search_mode:{
                handler(){
                    let nis1 = this;
                    clearTimeout(this.timer);
                    this.timer = setTimeout(function (){
                        if (nis1.keyword === ''){
                            nis1.load();
                        }else {
                            nis1.search();
                        }
                    },300);
                }
            },
            sorts:{
                handler(){
                    this.sort();
                }
            }
        },
        mounted:function (){
            let niss = this;
            $_c.watch("config",function (){
                niss.load();
            });
        },
        methods:{
            load:function (){
                let niss = this;
                axios.get("<?php echo route("stock.index"); ?>",{
                    headers:$_i.headers,
                    params:niss.params
                })
                    .then(response=>{
                        niss.stocks = response.data
                    }).catch(function (err){
                    console.log(err.response);
                })
            },
            search:function (){
                let nis = this;
                axios.get("<?php echo route("stock.index"); ?>",{
                    headers:$_i.headers,
                    params:{
                        keyword:nis.keyword,
                        mode:nis.search_mode
                    }
                }).then(function (searched){
                    nis.stocks = searched.data;
                }).catch(function (error){
                    alert(error);
                });
            },
            money:function (money,currency){
                switch (currency){
                    case "riel":
                        return numeral(money).format('0,0') + "៛";
                        break;
                    case "usd":
                        return numeral(parseFloat(money)).format('0,0.00$');
                        break;
                    case "bath":
                        return numeral(money).format('0,0') + "បាត";
                        break;
                    default:
                        return numeral(parseFloat(money)).format('$0,0.00');
                        break;
                }
            },
            sort:function (){
                let sortto = this.sorts.split(",");
                srtz(this.stocks,sortto[0],sortto[1]);
            },
            countf:function (idx){
                let nis = this;
                axios.post("<?php echo route("stock.store"); ?>", null,{
                    headers:$_i.headers,
                    params:{
                        item_id:nis.count.item_id,
                        qty:nis.count.count,
                        type:"lost",
                        date:nis.count.date,
                        subject:"count"
                    }
                }).then(function (counted){
                    if (counted.data.error){

                    }else{
                        nis.stocks[idx].lost = counted.data.data.qty;
                        nis.stocks[idx].lost_date = counted.data.data.date;
                        nis.count.is = 'on';
                        nis.count.count = '';
                    }
                }).catch(function (err){
                    console.log(err.response);
                })
            },
            timer:setTimeout(function (){},300)
        }
    });
</script>
