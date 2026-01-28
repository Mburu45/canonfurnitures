@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-off-white py-16">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-serif font-bold text-charcoal text-center mb-8">Contact Us</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>

                <h2 class="text-xl font-medium text-charcoal mb-4">Get in Touch</h2>

                <p class="text-charcoal mb-4">Have questions? We'd love to hear from you.</p>

                <p class="text-charcoal mb-2"><strong>Email:</strong> info@oakfurnitures.com</p>

                <p class="text-charcoal mb-2"><strong>Phone:</strong> +254 794 939949</p>

                <p class="text-charcoal"><strong>Address:</strong> Kahawa Sukari, along Thika Road</p>

            </div>

            <div>

                <form class="bg-white p-6 rounded-md shadow-md">

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Name</label>

                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2">

                    </div>

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Email</label>

                        <input type="email" class="w-full border border-gray-300 rounded-md px-3 py-2">

                    </div>

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Message</label>

                        <textarea rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>

                    </div>

                    <button type="submit" class="bg-oak-brown hover:bg-dark-oak text-off-white px-6 py-2 rounded-md">Send Message</button>

                </form>

            </div>

        </div>

    </div>

</div>

@include('layouts.footer')

@endsection