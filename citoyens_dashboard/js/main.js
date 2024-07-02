document.addEventListener('DOMContentLoaded', function() {
    const signInButton = document.getElementById('signInButton');
    const logInButton = document.getElementById('logInButton');
    const buttonContainer = document.getElementById('div');

    signInButton.addEventListener('click', function() {
        buttonContainer.classList.add('active');
        signInButton.classList.add('active');
        logInButton.classList.remove('active');
    });

    logInButton.addEventListener('click', function() {
        buttonContainer.classList.remove('active');
        logInButton.classList.add('active');
        signInButton.classList.remove('active');
    });

    // Initialize the active button state
    if (buttonContainer.classList.contains('active')) {
        signInButton.classList.add('active');
        logInButton.classList.remove('active');
    } else {
        logInButton.classList.add('active');
        signInButton.classList.remove('active');
    }
});

/* images and text animation in the first section
.
.
.
.
*/
document.addEventListener("DOMContentLoaded", function() {
    const imgPlace1 = document.querySelector("#imgplace1");
    const imgPlace2 = document.querySelector("#imgplace2");
    const imgPlace3 = document.querySelector("#imgplace3");
    const textEventChanging = document.querySelector("#texteventchanging");

    const images = [
        { src: "images/MedNiss.png", text: "Text for MK Logo noww i'm writing a text from nothing that is nothing because i just need to fill a place in my div" },
        { src: "images/MedNiss (1).png", text: "Text for logo7 lorem kbcvk hgfg kkhj njhjb jnjkghfgv bhjvghj hghjvb jbjhvb jhvhj vjv hjfd gjh hk h hh u kjl;jl j  j jh kjh l " },
        { src: "images/MedNiss (2).png", text: "Text for Tom jhvbsdhkl ;wjbf     Lorem ipsum dolor sit amet consectetur adipidunt dignissimos! Excepturi magni veritatis sint unde.  knkh      " },
        { src: "images/MedNiss (3).png", text: "Text for somthing else  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quidem amet ipsam incidunt saepe nemo nihil asperiores rem odit repudiandae!        " },
        { src: "images/MedNiss (4).png", text: "Text for slamdunk     Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, laboriosam.        " },
        { src: "images/MedNiss (5).png", text: "Text for kiluia zoldik     Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ullam consectetur commodi minima non voluptate tenetur officia veritatis, porro consequuntur laborum quo, fuga tempora. Quaerat tenetur nesciunt voluptatibus? Inventore, culpa!        " },
        { src: "images/MedNiss (2).png", text: "Text for ilkay gondugan     Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae repellendus placeat unde ex impedit est adipisci, laborum minus deleniti eveniet dolores tenetur eligendi nihil autem neque enim. Unde, corporis totam!        " },
        { src: "images/MedNiss.png", text: "Text for gon frex     Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, excepturi aspernatur eligendi voluptatem quam a?        " },
        { src: "images/MedNiss (4).png", text: "Text for map1 sum dolor sit amet consectetur adipidunt dignissimos! sum dolor sit amet consectetur adipidunt dignissimos!" },
        { src: "images/MedNiss (2).png", text: "Text for songoku orem kbcvk hgfg kkhj njhjb jnjkghfgv bhjvghj orem kbcvk hgfg kkhj njhjb jnjkghfgv bhjvghj " },
        { src: "images/MedNiss (5).png", text: "Text for cristiano ronaldo ur adipisicing elit. ur adipisicing elit. ur adipisicing elit. " },
    ];

    let currentIndex = 0;

    function updateImages() {
        imgPlace1.innerHTML = `<img src="${images[(currentIndex + 0) % images.length].src}" alt="">`;
        imgPlace2.innerHTML = `<img src="${images[(currentIndex + 1) % images.length].src}" alt="">`;
        imgPlace3.innerHTML = `<img src="${images[(currentIndex + 2) % images.length].src}" alt="">`;

        imgPlace1.querySelector("img").classList.add("hidden");
        imgPlace2.querySelector("img").classList.add("hidden");
        imgPlace3.querySelector("img").classList.add("hidden");

        setTimeout(() => {
            imgPlace1.querySelector("img").classList.remove("hidden");
            imgPlace2.querySelector("img").classList.remove("hidden");
            imgPlace3.querySelector("img").classList.remove("hidden");
        }, 20); // Small timeout to trigger transition

        // Update text
        textEventChanging.textContent = images[(currentIndex + 1) % images.length].text;
    }

    function swapImages() {
        currentIndex = (currentIndex + 1) % images.length;
        updateImages();
    }

    setInterval(swapImages, 4000); // Adjust the timing as needed

    updateImages(); // Initial load
});
