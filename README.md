# TIKKI : Certificate Validation

## Overview
TIKKI is a Certificate Validating web service designed to streamline the process of validating and managing digital certificates. It provides a centralized platform for users to check the validity of their certificates, ensuring that they are up-to-date and compliant with industry standards. This service is particularly useful for individuals and organizations that rely on digital certificates for authentication, access control, and identity verification purposes.

## Key Features

1. Certificate Validation
Certificate Number Lookup: Users can enter their certificate number to fetch the details of their certificate, including the issuing institution, issuing date, and owner name.
Normalization of Data: The API normalizes the data fetched from external sources to ensure consistency and accuracy, mapping source fields to target fields as defined in the mappings.

2. Endpoint Management
Dynamic Endpoint Configuration: The Application allows for the dynamic configuration of endpoints and their mappings, enabling the addition of new sources or the modification of existing ones without the need for code changes.
Session Management: The API utilizes session storage to cache fetched certificate details, reducing the need for repeated requests and improving performance.

- One is able to add endpoints, and the primary certificate fields,(source fields) which are normalized used for normalizing the results.
3. Security and Compliance
Secure Data Handling: All data is handled securely, with encryption in transit and at rest, ensuring that certificate details are protected from unauthorized access.
Compliance Checks: The API supports compliance checks against industry standards, helping users ensure that their certificates meet the necessary requirements.
4. User-Friendly Interface
RESTful API: The API provides a RESTful interface, making it easy for developers to integrate with various applications and platforms.
Detailed Responses: The API returns detailed responses, including error messages and status codes, to aid in troubleshooting and error handling.

#### Endpoints

###  Certificate lookup: POST '/certificate/{certificateNumber}
        { "certificate_number": " "}

### Getting Started
To get started with the Certificate Validation API, follow these steps:

Installation: Clone the repository and install the required dependencies using Composer.
Configuration: Set up your database and configure the application settings, including the database connection details and any external service URLs.
Endpoints: Define your endpoints and their mappings in the database. This includes the URL of the external service and the source and target fields for data normalization.
Testing: Use the provided test scripts to validate the functionality of your endpoints and mappings.
Deployment: Deploy the application to your server and ensure that all services are running correctly.

### Documentation
- Further documentation is still being written and updates will be promptly published.

### Contributing
Contributions to Tikki are welcome. Please feel free to submit pull requests or report issues through the project's repository.
Reach out to me at okonuian@gmail.com for any feedback/requests

### Disclaimer
-This software is currently under development and will be released as soon as it is stable.
