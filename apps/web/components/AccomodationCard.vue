<template>
  <UiCard class="rounded-md">
    <template #header>
      <AccomodationCardHeader status="active" />
    </template>
    <template #default>
      <div class="flex flex-row space-x-2">
        <img
          src="https://assets.atdw-online.com.au/images/40b5b5670372d0bed5ad0991924de137.jpeg?rect=222%2C0%2C3556%2C2667&w=745&h=559&&rot=360&q=eyJ0eXBlIjoibGlzdGluZyIsImxpc3RpbmdJZCI6IjU2YjIzZDE4YjA0MjM4NjI0NWQ0NDk0NiIsImRpc3RyaWJ1dG9ySWQiOiI1NmIxZWI5MzQ0ZmVjYTNkZjJlMzIwYzgiLCJhcGlrZXlJZCI6IjU2YjFlZTU5MGNmMjEzYWQyMGRjNTgxOSJ9"
          class="w-48 h-auto rounded-sm"
        />

        <div class="flex flex-col">
          <AccomodationCardDetails
            name="'Elouera Vale' Farm"
            host="Youcamp Pty Ltd trading as Hipcamp Australia"
          />
          <UiRating rating="4.2" />

          <AccomodationCardDescription
            description="Elouera Vale is a working farm located just outside Mittagong NSW. We breed and train camels for sale, especially into the Southern Highlands."
          />
        </div>
      </div>
    </template>
    <template #footer>
      <AccomodationCardFooter
        city="Mittagong"
        state="NSW"
        postcode="2575"
        area="Southern Highlands"
        region="Country NSW"
        geo-points="-34.450964,150.510644"
      />
    </template>
  </UiCard>
</template>
