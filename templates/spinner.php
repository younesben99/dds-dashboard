<style>

.ddsloadingwrap {
  width: 100%;
  height: 100%;
  background: #ffffff29 !important;
  position: fixed;
  top: 0;
  left: 0;
  backdrop-filter: blur(1px);
  z-index: 1000000 !important;
}
.ddsloading {
  position: fixed;
  top: 35%;
  width: 288px;
  height: 200px;
  background: #ffffff;
  left: 40%;
  z-index: 10000;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.3s;
  transition-timing-function: ease;
  transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
  border: 1px solid #cecece;
  border-radius: 5px;
  box-shadow: 0 2px 15px #f1f1f1;

}
.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #1c97c5;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #17ace3 transparent transparent transparent;

}.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>


<div class='ddsloadingwrap'><div class='ddsloading'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div></div>