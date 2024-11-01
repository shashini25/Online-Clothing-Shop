const toggleBtn=document.querySelector('.toggle-btn')
        const toggleBtnIcon=document.querySelector('.toggle-btn')
        const dropDown=document.querySelector('.drop-down')

        toggleBtn.onclick=function(){
            dropDown.classList.toggle('open')
           /* const isOpen=dropDown.classList.contains('open')

            toggleBtnIcon.classList= isOpen
                ? 'fas fa-xmark'
                :'fas fa-bars'*/
        }
//cart
const cartBtn= document.querySelector('#cart-btn');
const cart=document.querySelector('.cart');
const cartClose=document.querySelector('#cart-close');

cartBtn.onclick = () =>{
    cart.classList.add('active');
};
cartClose.onclick = () =>{
    cart.classList.remove('active');
};

//size chart
const sizeBtn=document.querySelector('#btnSize');
const sizeChart=document.querySelector('#size-chart-box');
const sizeClose=document.querySelector('.size-chart-close');

sizeBtn.onclick = () =>{
    sizeChart.classList.add ('open-sizechart');
};

//sub-menu
/*const clothes=document.querySelector('.clothes');
const subMenu=document.querySelector('.sub-menu');

clothes.onclick = () =>{
    subMenu.classList.add('open1');
};*/
