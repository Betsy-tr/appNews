<form action="{{!empty($actu)?route('news.edit', $actu->id):route('news.add')}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="mb-5">
  <label 
  for="titre" 
  class="mb-3 block text-base font-medium text-black">
  Titre
  </label>
  <input 
    type="text" 
    name="titre" 
    value="{{!empty($actu)?$actu->titre:''}}"
    placeholder="Saisissez un titre"
    class="w-full rounded-md border border-[#ff1010] bg-white py-3 px-6 text-base font-medium text-[#000000] outline-none focus:border-[#000000] focus:shadow-md"
  />
  @error('titre')
    <p class="text-base font-medium text-[#ff1010]">Merci de saisir un titre !</p> 
  @enderror
</div>

<div class="mb-5">
  <label
    for="image"
    class="mb-3 block text-base font-medium text-[#000000]"
  >
    Ajouter une image
  </label>
  <input
    type="file"
    name="image"
    placeholder="Sélectionner une image"
    class="w-full rounded-md border border-[#ff1010] bg-white py-3 px-6 text-base font-medium text-[#000000] outline-none focus:border-[#000000] focus:shadow-md"
  />
  @error('image')
    <p class="text-base font-medium text-[#ff1010]">Ajouter une image au bon format !</p> 
  @enderror
</div>

<div class="mb-5">
  <label
    for="description"
    class="mb-3 block text-base font-medium text-[#000000]"
  >
    Description
  </label>
  <textarea
    rows="4"
    name="description"
    placeholder="Saissisez une description"
    class="w-full resize-none rounded-md border border-[#ff1010] bg-white py-3 px-6 text-base font-medium text-[#000000] outline-none focus:border-[#000000] focus:shadow-md"
  >{{!empty($actu)?$actu->description:''}}</textarea>
</div>

<div class="mb-5">
  <button class="bg-white border border-[#ff1010] px-8 py-3 rounded-md font-medium text-black">{{!empty($actu)?'Modifier':'Ajouter'}}</button>
</div>



</form>