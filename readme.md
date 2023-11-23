# Product-Zone API

Product-Zone API serves as an endpoint to access product and category information based on API keys and specific queries.

## Usage

### Prerequisites

- PHP server with MySQL database
- Ensure you have configured the `config.php` file with valid database credentials.

### API Endpoint

#### Endpoint URL: `/api-url`

#### Supported Queries:

- **Find Products:** `/api-url?api_key=<YOUR_API_KEY>&find=product`
  - Returns a JSON array of all products.

- **Find Product by ID:** `/api-url?api_key=<YOUR_API_KEY>&find=product&product_id=<PRODUCT_ID>`
  - Returns a JSON object with product details based on the provided product ID.

- **Find Categories:** `/api-url?api_key=<YOUR_API_KEY>&find=category`
  - Returns a JSON array of all categories.

- **Check Total Hits:** `/api-url?api_key=<YOUR_API_KEY>&find=hits`
  - Returns the total hits count for the API key user.

### Important Notes:

- **API Key:** Replace `<YOUR_API_KEY>` in the query with a valid API key.
- **Permissions:** Valid API key with status `1` and total hits count below the maximum hits defined in the database are required for access.

## Code Explanation

- The script validates API key, specific query parameters (`find`), and performs database queries to fetch products, categories, or hit counts.
- Ensures status is active (1) and total hits for the user are below the defined maximum hits.
- Returns JSON data based on the query or an empty array `[]` if no data is found.

### Endpoint Structure:

/api-url
│
├── ?api_key=<YOUR_API_KEY>&find=product
├── ?api_key=<YOUR_API_KEY>&find=product&product_id=<PRODUCT_ID>
├── ?api_key=<YOUR_API_KEY>&find=category
└── ?api_key=<YOUR_API_KEY>&find=hits

## Security Note:

- Keep your API keys secure and avoid exposing them in publicly accessible locations.
- Implement necessary security measures such as input validation, authentication, and data sanitization to protect against potential vulnerabilities.
