<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 row-start-6">
                {{ title }}
            </h2>
        </template>
        <div class="py-12">

            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

                <div class="mt-10 sm:mt-0">
                <div class="flex justify-center">
                    <div class="mt-5 md:mt-0 md:col-span-2 ">
                    <form @submit.prevent="updateProfileInformation">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6 ">
                                    <div v-if="$page.props.flash.message" class="text-white px-6 py-4 border-0 rounded mb-4 bg-green-500">
                                        <span class="text-xl inline-block mr-5 align-middle">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-1 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                            </svg>
                                        </span>
                                        <span class="inline-block align-middle mr-8">
                                            <b class="capitalize"> {{ $page.props.flash.status }} ,</b> {{ $page.props.flash.message }}
                                        </span>
                                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                                            <span>×</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6 text-center mb-2" v-if="$page.props.jetstream.managesProfilePhotos">
                                    <!-- Profile Photo File Input -->
                                    <input type="file" class="hidden"
                                                ref="photo"
                                                >
                                    <!-- Current Profile Photo -->
                                    <div class="mt-2 flex justify-center" v-show="! photoPreview">
                                        <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                                    </div>

                                    <!-- New Profile Photo Preview -->
                                    <div class="mt-2 " v-show="photoPreview">
                                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                            :style="'background-image: url(\'' + photoPreview + '\');'">
                                        </span>
                                    </div>
                                    <jet-secondary-button class="mt-2 mr-2" type="button" >
                                        ubah
                                    </jet-secondary-button>
                                    <jet-secondary-button type="button" class="mt-2"  v-if="user.profile_photo_path">
                                        hapus
                                    </jet-secondary-button>

                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <jet-label for="name" class="block text-sm font-medium text-gray-700"  value="Nama User" />
                                    <jet-input type="text" id="name" v-model="form.name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <jet-input-error :message="form.errors.name" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <jet-label for="email" class="block text-sm font-medium text-gray-700" value="Email" />
                                    <jet-input id="email" type="email" v-model="form.email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <jet-input-error :message="form.errors.email" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 mb-2">
                                    <jet-label for="role" class="block text-sm font-medium text-gray-700" value="Role" />
                                     <select id="role" name="role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.role">
                                        <option value="0">--Please Select--</option>
                                        <option v-for="(role, index) in roles" :key="index" :value="role.value">
                                            {{ role.name }}
                                        </option>
                                    </select>

                                    <jet-input-error :message="form.errors.role" class="mt-2" />
                                </div>


                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <jet-button type="submit" :class="{ 'opacity-25': form.processing }"
                                 :disabled="form.processing">Save</jet-button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import { useForm } from '@inertiajs/inertia-vue3'
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },
        props:['title','user'],

        setup(props){
            const form = useForm({
                _method : "PUT",
                name : props.user.name,
                email : props.user.email,
                role  : props.user.role
            });

            const roles = [{name: "Admin",value: "admin"},{name: "User", value: "user"}];

            function updateProfileInformation(){
                console.log('tesss');
                form.post(route("users.update",props.user.id),{
                    preserveScroll: true,
                    onSuccess : () => form.reset('password')
                });
            }
            return { form, roles , updateProfileInformation};
        },

        clearPhotoFileInput() {
            if (this.$refs.photo?.value) {
                this.$refs.photo.value = null;
            }
        },


    })
</script>
