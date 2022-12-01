<template>
  <main class="my-2">
    <div class="container mx-auto py-5">
      <h1 class="text-4xl font-bold mb-8">User Logs</h1>
      <div class="flex gap-4">
        <form class="flex gap-4">
          <div class="flex items-center justify-center">
            <div class="datepicker relative form-floating mb-3 xl:w-96">
              <input
                type="date"
                v-model="data.date"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Select a date"
              />
            </div>
          </div>
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            @click.prevent="getUserLogs"
          >
            Filter By Date
          </button>
        </form>
      </div>
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th
                      scope="col"
                      class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    >
                      #
                    </th>
                    <th
                      scope="col"
                      class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    >
                      Name
                    </th>
                    <th
                      scope="col"
                      class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    >
                      Gender
                    </th>
                    <th
                      scope="col"
                      class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    >
                      Finger Id
                    </th>
                    <th
                      scope="col"
                      class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    >
                      Date
                    </th>
                    <th
                      scope="col"
                      class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                    >
                      Time In
                    </th>
                  </tr>
                </thead>
                <tbody v-if="(data.users.length > 0)">
                  <tr
                    v-for="user in data.users"
                    :key="user.id"
                    class="border-b"
                  >
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      {{ user.id }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      {{ user.username }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      {{ user.gender }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      {{ user.fingerprint_id }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      {{ user.user_date }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      {{ user.time_in }}
                    </td>
                  </tr>
                </tbody>
                <tbody v-else>
                  <tr>
                    <td colspan="6" 
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                      No data found
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { reactive, ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import { APIURL } from "../constants";
import axios from "axios";

const data = reactive({
  date: new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000)
    .toISOString()
    .split("T")[0],
  users: [],
});

const getUserLogs = async () => {

  const res = await axios.post(`${APIURL}/user_log_date.php`, { select_date: data.date });
  data.users = res.data;
};

const getUsers = async () => {
  const response = await fetch(`${APIURL}/get_users.php`);
  const responseData = await response.json();
  data.users = responseData;
};

onMounted(getUsers);
</script>

<style></style>
