import { defineStore } from 'pinia'
import { IProduct } from '~~/contracts/IProduct'


export const useAccommodationsStore = defineStore({
    id: 'accommodation-store',
    state: () => {
        return {
            accommodationsList: [] as Array<IProduct>,
            page: 1,
            size: 10,
            loading: false,
            error: false,
        }
    },
    actions: {
        async loadAccommodations(query: Record<string, string> = {}) {
            this.loading = true;
            const {
                data: accommodations,
                pending,
                error,
            } = await useApiFetch<IProduct>("/api/products", {
                query
            });

            this.accommodationsList = accommodations.value?.data || [];
            this.loading = pending.value;
            this.error = !!error.value;
        }
    },
    getters: {
        accommodations: state => state.accommodationsList,
        isLoading: state => state.loading,
        hasError: state => state.error,
    },
})
