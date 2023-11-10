const pathName = window.location.pathname
const pageName = pathName.split("/").pop();

if(pageName == "index.html"){
    document.querySelector(".beranda-btn").classList.add("activeLink");
}
if(pageName == "informasi.html"){
    document.querySelector(".informasi-btn").classList.add("activeLink");
}
if(pageName == "galeri.html"){
    document.querySelector(".galeri-btn").classList.add("activeLink");
}
if(pageName == "lapor.html"){
    document.querySelector(".lapor-btn").classList.add("activeLink");
}
if(pageName == "pemerintahan.html"){
    document.querySelector(".pemerintahan-btn").classList.add("activeLink");
}
if(pageName == "profil.html"){
    document.querySelector(".profil-btn").classList.add("activeLink");
}