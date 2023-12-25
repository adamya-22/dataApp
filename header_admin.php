<style>
    body{margin:0; padding:0;background: linear-gradient(35deg, #9a12b3, #c5eff7);}
    a{text-decoration:none; color:white; font-weight:200;}
    .iconbar{
    display: grid;
    min-height: 130px;
    background-color: #e3e2df;
    justify-content: space-around;
    align-items: center;
    grid-template-columns: 18% 34% 20%;
    height:19vh;
}

.logo1{
    height: 130px;
}

.iconelem{
  position: absolute;
  display: grid;
  grid-template-columns: auto auto;
  grid-gap: 15px;
  width: min-content;
  right: 5px;
}
.logo2{
    height: 30px;
    border-radius: 20px;
    border: 2px solid ;
}
.cart_count{
  position: relative;
  top: -15px; 
  left: -9px; 
  color: black; 
  background: white; 
  border-radius: 10px; 
  padding: 1px 6px;
}
@media only screen and (max-width: 1024px) {
  .iconbar{
    display: grid;
    height: fit-content;
    background-color: #e3e2df;
    justify-content: space-around;
    align-items: center;
    grid-template-columns: 10% 34% 20%;
}
.logo1{
  height: 75%;
  width: 125%;
}
.iconelem{
  margin-left: 110px;
  display: grid;
  grid-template-columns: auto auto;
  grid-gap: 15px;
  width: min-content;
}
}
@media only screen and (max-width: 600px) {
  .iconelem{
    margin-left: 19px;
    display: grid;
    grid-template-columns: auto auto;
    grid-gap: 6px;
    width: min-content;
  }
  .iconbar{
    display: grid;
    height: 100px;
    background-color: #e3e2df;
    justify-content: space-around;
    align-items: center;
    grid-template-columns: 0% 34% 20%;
}
.logo1{
  height: 60%;
  width: 150%;
}
}

</style>
<div class="iconbar">
    <div></div>
    <a href="admin_panel.php" style="display: flex;justify-content: center;"><img src="assets\srajan2c.jpg" alt="" class="logo1" style=" height:100px; width:350px;"></a>
    <div></div>
</div>

