<template>
  <nav
    class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light"
  >
    <div
      class="container-fluid w-full flex flex-wrap items-center justify-between px-6"
    >
      <div class="flex justify-between w-full flex-grow items-center" id="navbarSupportedContent">
        <a class="text-xl text-black" href="#"
          ><img
            alt="Vue logo"
            class="logo w-[72px]"
            src="@/assets/logo.svg"
        /></a>
        <!-- Left links -->
        <ul class="navbar-nav flex  pl-0 list-style-none">
          <li class="nav-item px-2">
            <router-link
              class="nav-link text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-gray-500 hover:text-gray-800"
              to="/"
              >User</router-link
            >
          </li>
          <li class="nav-item pr-2">
            <router-link
              class="nav-link text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-gray-500 hover:text-gray-800"
              to="/user-logs"
              >User Logs</router-link
            >
          </li>
          <li class="nav-item pr-2">
            <router-link
              class="nav-link text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-gray-500 hover:text-gray-800"
              to="/manage-users"
              >Manage User</router-link
            >
          </li>
        </ul>
        <!-- Left links -->
      </div>

      <!-- Collapsible wrapper -->
    </div>
  </nav>
</template>

<script setup>
import { RouterLink } from "vue-router";
</script>

<style scoped></style>
