// ilages and text animation in the first section
/* 
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
        { src: "images/MK Logo.jpeg", text: "Text for MK Logo noww i'm writing a text from nothing that is nothing because i just need to fill a place in my div" },
        { src: "images/logo7.jpg", text: "Text for logo7 lorem kbcvk hgfg kkhj njhjb jnjkghfgv bhjvghj hghjvb jbjhvb jhvhj vjv hjfd gjh hk h hh u kjl;jl j  j jh kjh l " },
        { src: "images/adil.jpg", text: "Text for adil jhvbsdhkl ;wjbf     Lorem ipsum dolor sit amet consectetur adipidunt dignissimos! Excepturi magni veritatis sint unde.  knkh      " },
        { src: "images/1.png", text: "Text for somthing else  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quidem amet ipsam incidunt saepe nemo nihil asperiores rem odit repudiandae!        " },
        { src: "images/50 Minimalist Desktop Wallpapers and Backgrounds (2022 Edition).jpg", text: "Text for slamdunk     Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, laboriosam.        " },
        { src: "images/558672d1f7df90911ba819d11cbbca29.jpg", text: "Text for kiluia zoldik     Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ullam consectetur commodi minima non voluptate tenetur officia veritatis, porro consequuntur laborum quo, fuga tempora. Quaerat tenetur nesciunt voluptatibus? Inventore, culpa!        " },
        { src: "images/90717965_marketplace-o-que-e.jpg", text: "Text for ilkay gondugan     Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae repellendus placeat unde ex impedit est adipisci, laborum minus deleniti eveniet dolores tenetur eligendi nihil autem neque enim. Unde, corporis totam!        " },
        { src: "images/LOGO colored.jpg", text: "Text for gon frex     Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, excepturi aspernatur eligendi voluptatem quam a?        " },
        { src: "images/map1.png", text: "Text for map1 sum dolor sit amet consectetur adipidunt dignissimos! sum dolor sit amet consectetur adipidunt dignissimos!" },
        { src: "images/uwp3120159.jpg", text: "Text for songoku orem kbcvk hgfg kkhj njhjb jnjkghfgv bhjvghj orem kbcvk hgfg kkhj njhjb jnjkghfgv bhjvghj " },
        { src: "images/téléchargement.jpeg", text: "Text for cristiano ronaldo ur adipisicing elit. ur adipisicing elit. ur adipisicing elit. " },
        // Add more image paths and associated text here
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

// website statistics bar in the first section again
/* 
.
.
.
.
*/

document.addEventListener('DOMContentLoaded', () => {
    const counts = document.querySelectorAll('.count');
    const duration = 2000; // Duration of the animation in milliseconds

    counts.forEach((counter) => {
        const target = +counter.getAttribute('data-target');
        let startTime = null;

        function updateCounter(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = timestamp - startTime;
            const current = Math.min(progress / duration * target, target);

            counter.innerText = Math.floor(current);

            if (current < target) {
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target;
            }
        }

        requestAnimationFrame(updateCounter);
    });
});