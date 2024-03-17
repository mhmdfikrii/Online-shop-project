@extends('layouts.main')

<section class="mt-7 sm:mt-16 md:mt-16">
    <div class="bg-slate-200 px-4 py-2 text-sm">
        <span class="mt-2"><a href="/">Home</a> <i class="bi bi-caret-right"></i> <span class="font-semibold">NIKE AIR
                JORDAN RETRO</span></span>
    </div>
    <div class="container mx-auto">
        <h1 class="font-bold text-2xl uppercase mb-2 mt-2">Nike Air Jordan Retro</h1>
        <span class="text-sm mb-5"><span class="font-semibold">Category:</span> Sepatu Olahraga</span>

        <div class="border border-slate-200 mt-4 mb-4"></div>

        <div class="bg-slate-500 h-4/6 w-4/5 rounded border border-gray-300 mb-4">
        </div>
        <div class="overflow-x-auto">
            <div class="flex gap-4">
                <div class="bg-slate-500 h-48 w-48 rounded border border-gray-300 mb-4">
                </div>
                <div class="bg-slate-500 h-48 w-48 rounded border border-gray-300 mb-4">
                </div>
                <div class="bg-slate-500 h-48 w-48 rounded border border-gray-300 mb-4">
                </div>
                <div class="bg-slate-500 h-48 w-48 rounded border border-gray-300 mb-4">
                </div>
                <div class="bg-slate-500 h-48 w-48 rounded border border-gray-300 mb-4">
                </div>
            </div>
        </div>
        <div class="border border-slate-200 mt-4 mb-4"></div>

        <div class="mb-6 text-justify">
            <h1 class="font-bold text-2xl mb-2 mt-2">Keterangan Produk</h1>
            <div class="text-base">
                <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum ipsam nostrum iste optio
                    blanditiis possimus ipsum quisquam, laudantium impedit. Odit ducimus deserunt vel dolorum,
                    laudantium numquam aperiam quia sed ipsa culpa error incidunt, deleniti consectetur in rem aliquam
                    dignissimos quasi non officia excepturi nesciunt unde! Impedit aspernatur cupiditate, earum ex
                    dolore voluptatibus eos quisquam, culpa ipsam mollitia atque. Ut aspernatur beatae fugit sit eaque
                    voluptate perspiciatis deleniti quod voluptates a suscipit autem consequatur reiciendis id doloribus
                    culpa nihil distinctio corrupti, ab sapiente laboriosam officiis. Nisi amet pariatur aliquid,
                    possimus exercitationem deserunt. Voluptas ipsum neque sapiente ab quibusdam voluptates dolore in
                    officia repellat cum inventore mollitia, rem recusandae. Illum quis doloremque qui, illo autem
                    facilis tempora incidunt, corporis laborum doloribus voluptatibus facere error dicta voluptates
                    atque at, expedita ut! Distinctio, eligendi facilis possimus nulla quis ullam culpa incidunt est ea
                    fugit doloremque. Sint ducimus voluptatum ut voluptas. Quis, exercitationem libero molestias ad quo
                    optio laboriosam excepturi! Omnis quas neque cumque magnam qui repellat autem ab libero eveniet
                    dolor odit, voluptate mollitia, voluptates quibusdam debitis quam sed molestiae culpa laboriosam?
                    Non voluptatibus minus perspiciatis veniam eius excepturi cum sapiente ullam natus provident totam
                    animi, maxime repellendus, quia reiciendis, eaque distinctio ab velit?<br><br>Lorem ipsum, dolor sit
                    amet consectetur adipisicing elit. Dolorum ipsam nostrum iste optio blanditiis possimus ipsum
                    quisquam, laudantium impedit. Odit ducimus deserunt vel dolorum, laudantium numquam aperiam quia sed
                    ipsa culpa error incidunt, deleniti consectetur in rem aliquam dignissimos quasi non officia
                    excepturi nesciunt unde! Impedit aspernatur cupiditate, earum ex dolore voluptatibus eos quisquam,
                    culpa ipsam mollitia atque. Ut aspernatur beatae fugit sit eaque voluptate perspiciatis deleniti
                    quod voluptates a suscipit autem consequatur reiciendis id doloribus culpa nihil distinctio
                    corrupti, ab sapiente laboriosam officiis. Nisi amet pariatur aliquid, possimus exercitationem
                    deserunt. Voluptas ipsum neque sapiente ab quibusdam voluptates dolore in officia repellat cum
                    inventore mollitia, rem recusandae. Illum quis doloremque qui, illo autem facilis tempora incidunt,
                    corporis laborum doloribus voluptatibus facere error dicta voluptates atque at, expedita ut!
                    Distinctio, eligendi facilis possimus nulla quis ullam culpa incidunt est ea fugit doloremque. Sint
                    ducimus voluptatum ut voluptas. Quis, exercitationem libero molestias ad quo optio laboriosam
                    excepturi! Omnis quas neque cumque magnam qui repellat autem ab libero eveniet dolor odit, voluptate
                    mollitia, voluptates quibusdam debitis quam sed molestiae culpa laboriosam? Non voluptatibus minus
                    perspiciatis veniam eius excepturi cum sapiente ullam natus provident totam animi, maxime
                    repellendus, quia reiciendis, eaque distinctio ab velit?</div>
            </div>
        </div>
    </div>
    <div id="bottomBar" class="fixed bottom-0 bg-amber-400 h-14 w-full rounded border border-gray-300">
    </div>
</section>

<script>
    let isScrolling = false;
    let timeout;

    const bottomBar = document.getElementById('bottomBar');

    window.addEventListener('scroll', function() {
        clearTimeout(timeout);
        isScrolling = true;

        timeout = setTimeout(function() {
            isScrolling = false;
            // Tampilkan bottom bar jika tidak ada scrolling
            if (!isScrolling) {
                bottomBar.classList.remove('hidden');
            }
        }, 100);

        // Hanya sembunyikan bottom bar jika sedang scrolling
        if (isScrolling) {
            bottomBar.classList.add('hidden');
        }
    });
</script>


