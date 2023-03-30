import { IFilterOption } from "./IFilterOption";

export interface IRegion extends IFilterOption {
    code: string;
    type: string;
    state: string;
}