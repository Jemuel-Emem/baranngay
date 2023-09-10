<div>
    <x-notifications position="top-right" />
    <div class="flex gap-2">
        <input type="text" name="" id="" placeholder="search..." class="w-full rounded" wire:model="search" >
        <button class="bg-blue-800 w-40 text-white rounded hover:bg-blue-900" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" >Add Officials</button>
        <button class="bg-blue-800 w-40 text-white rounded hover:bg-blue-900" wire:click.prevent="searchh()" >Search</button>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead
                  class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600 text-blue-900">
                  <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Full name</th>
                    <th scope="col" class="px-6 py-4">Purok</th>
                    <th scope="col" class="px-6 py-4">Sex/Gender</th>
                    <th scope="col" class="px-6 py-4">Age</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($officials as $offials)
                  <tr
                    class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $offials->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $offials->fullname}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $offials->purok}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $offials->gender}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $offials->age}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $offials->status}}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <a href=""></a>
                        <span class="material-symbols-outlined text-blue-800 cursor-default hover:text-blue-900"  data-modal-target="update" data-modal-toggle="update" wire:click="edit({{ $offials->id }})">
                            edit
                            </span>
                            <span class="material-symbols-outlined text-red-700 cursor-default hover:text-red-800">
                                delete
                                </span>
                                <span class="material-symbols-outlined text-green-800 cursor-default hover:text-green-900">
                                    visibility
                                    </span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div> {{ $officials->links() }}</div>
      </div>

  <!-- Main modal -->
  <div wire:ignore.self  id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
        <div class="gap-2 flex justify-center flex-col text-center">
          </div>
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-black text-blue-900 dark:text-white ">ADD OFFICIALS</h3>
                  <form class="space-y-6" action="#">
                      <div>
                          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                          <input wire:model="fullname" type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                          @error('fullname') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                          @enderror
                        </div>
                      <div>
                          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purok</label>
                          <input wire:model="purok" type="text" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                          @error('purok') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                          @enderror
                        </div>
                      <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select wire:model="gender" id="countries" class="bg-gray-50 border border-gray-300 text-gray-600  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full" required>
                            <option selected>Choose a gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        @error('gender') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                        <input wire:model="age" type="text" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                       @error('age') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                          @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select wire:model="status" id="countries" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full" required>
                            <option selected>Choose a status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                          </select>

            @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
                    </div>

                      <button wire:click.prevent="addofficial()" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Official</button>
                      <button wire:click.prevent="resett()" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset</button>
                  </form>
              </div>
          </div>
      </div>
  </div>



  {{-- update modal here --}}

  <div wire:ignore.self  id="update" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="gap-2 flex justify-center flex-col text-center">
        </div>
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-black text-blue-900 dark:text-white ">UPDATE OFFICIALS</h3>
                <form class="space-y-6" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                        <input wire:model="fullname" type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                        @error('fullname') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                      </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purok</label>
                        <input wire:model="purok" type="text" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        @error('purok') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                      </div>
                    <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                      <select wire:model="gender" id="countries" class="bg-gray-50 border border-gray-300 text-gray-600  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full" required>
                          <option selected>Choose a gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      @error('gender') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                      @enderror
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                      <input wire:model="age" type="text" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>

                     @error('age') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                      <select wire:model="status" id="countries" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full" required>
                          <option selected>Choose a status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widow">Widow</option>
                        </select>

          @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span>
          @enderror
                  </div>

                    <button wire:click.prevent="updateofficial()" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Official</button>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
