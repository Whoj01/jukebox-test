<template>
    <section class="flex justify-center items-center max-w-full min-h-screen px-2">
        <div class="flex flex-col items-center justify-center w-full rounded-md md:max-h-[600px] h-full overflow-clip md:flex-row md:max-w-[768px]">
            <div class="flex md:self-stretch items-center justify-center w-full md:w-1/2 h-auto bg-blue-700 px-4 py-6">
                <img src="@/assets/jukebox-logo.svg" alt="logo jukebox">
            </div>

            <slot></slot>
        </div>
    </section>
</template>

