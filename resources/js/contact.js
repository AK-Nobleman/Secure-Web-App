const images = {
customerSupport: "/resources/images/contact/viber.png",
location: "/resources/images/contact/pin.png",
email: "/resources/images/contact/email.png"
};

const image1 = document.getElementById("image1");
const image2 = document.getElementById("image2");
const image3 = document.getElementById("image3");

image1.src = images.customerSupport;
image2.src = images.location;
image3.src = images.email;