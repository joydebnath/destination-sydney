import { defineStore } from 'pinia'
import { IFilter } from '~~/contracts/IFilterOption'

export interface IFilterStore {
    region: string;
    filtersList: IFilter;
}

export const useFiltersStore = defineStore({
    id: 'filter-store',
    state: () => {
        return {
            region: 'Greater Sydney',
            filtersList: {
                areas: [],
                suburbs: [],
            },
        } as IFilterStore
    },
    actions: {
        addToFilterList(pauload: IFilter) {
            this.filtersList = { ...this.filtersList, ...pauload };
        },
    },
    getters: {
        filters: state => state.filtersList,
        regionName: state => state.region,
    },
})
