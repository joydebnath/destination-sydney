export interface IProduct {
    id: string;
    name: string;
    status: string;
    organisation_name: string;
    atw_expiry_date: string;
    updated_at: string;
    description: string;
    image: string;
    geo_points: string;
    address: {
        city: string;
        state: string;
        country: string;
        postcode: string;
        area: string;
        region: string;
    };
    score: number;
}