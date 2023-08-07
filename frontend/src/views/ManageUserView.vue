<template lang="">
  <div class="container mx-auto py-8">
    <div class="grid grid-cols-4 gap-4">
      <div class="col-span-1">
        <div class="rounded-lg shadow-lg border border-gray-400 p-4">
          <div
            class="bg-green-700 text-white p-2 w-full mb-4 rounded-lg"
            v-if="alert"
          >
            {{ alert }}
          </div>
          <input
            type="text"
            v-model="fingerid"
            id=""
            class="border border-gray-300 rounded-lg px-4 py-3 mb-4 w-full"
            placeholder="Please enter fingerprint id"
          />
          <button
            class="bg-blue-500 text-white rounded-md w-full px-4 py-3"
            @click="addFingerBtn"
          >
            Add Fingerprint ID
          </button>
          <div class="mt-6">
            <p class="font-bold text-black text-2xl mb-4">User Info: </p>
            <fieldset>
              <label for="">Name</label>
              <input type="text" name="" placeholder="User Name" class="border border-gray-300 rounded-lg px-4 py-3 mb-4 w-full" id="">
            </fieldset>
            <fieldset>
              <label for="">Serial Number</label>
              <input type="text" name="" placeholder="Serial number" class="border border-gray-300 rounded-lg px-4 py-3 mb-4 w-full" id="">
            </fieldset>
            <fieldset>
              <label for="">Email</label>
              <input type="text" name="" placeholder="Email" class="border border-gray-300 rounded-lg px-4 py-3 mb-4 w-full" id="">
            </fieldset>
            <fieldset>
              <label for="">Time in</label>
              <input type="time" name="" placeholder="Email" class="border border-gray-300 rounded-lg px-4 py-3 mb-4 w-full" id="">
            </fieldset>
            <fieldset>
              <label for="">Gender: </label>
              <input type="radio" name="gender" class="gender" value="Female">Female
	          	<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-span-3">
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
                        Finger ID
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
                        S. No
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
                  <tbody v-if="users.length > 0">
                    <tr
                      v-for="user in users"
                      :key="user.id"
                      class="border-b"
                    >
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 flex gap-2 items-center"
                      >
                        <div class="rounded-full bg-green-700 h-3 w-3" v-if="user.fingerprint_select"></div>
                        {{ user.fingerprint_id }}
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
                        {{ user.serialnumber }}
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
                    No Data
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { APIURL } from "../constants";

const fingerid = ref("");
const users = ref([]);
const alert = ref("");

onMounted(async () => {
  const response = await fetch(`${APIURL}/manage_users_upjson.php`);
  const data = await response.json();
  users.value = data;
  console.log(data);
});

const addFingerBtn = () => {
  if (fingerid.value == "") {
    alert.value = "Please enter a valid fingerprint ID";
    return;
  }

  const res = axios
    .post(`${APIURL}/manage_users_conf.php`, {
      fingerid: fingerid.value,
      Add_fingerID: true,
    })
    .then((res) => {
      console.log(res.data);
      alert.value = res.data;
    });
};
</script>
