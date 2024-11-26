# Use Case Diagram with Description and Assumptions for a Service Provider like Urban Clap Application

---

## **Use Case Diagram**
**Actors:**
1. **Customer**
2. **Service Provider**
3. **Admin**
4. **Identity Provider**
5. **Payment Services**
6. **Help Desk**

**Use Cases:**
1. Login
2. Registration
3. Update Profile
4. View Services
5. Search Services
6. Filter
7. Call for a Tender
8. Book a Service
9. Payment
10. View/Update Order Status
11. Notification
12. Update Service Details
13. Approve Request
14. View Tender List
15. Bid for Tender
16. Work Status Update
17. Cancel Order
18. Refund
19. Provide Cost & Work Location
20. Manage System

---

## **Descriptions**

### **Actors**
- **Customer**: Native users who register, search, filter, book services, and make payments. They can cancel bookings, provide feedback, and receive refunds.
- **Service Provider**: Individuals offering services. They register, update their profiles, bid on tenders, and receive payments after completing services.
- **Admin**: Manages operations, assigns service providers, updates the system, and resolves technical or legal issues.
- **Identity Provider**: Third-party services authenticate users for secure access.
- **Payment Services**: Facilitates secure electronic payments, refunds, and payment status updates.
- **Help Desk**: Provides technical and customer support through chat or call features.

---

### **Key Use Cases**
- **Login**: Allows customers and service providers to access their accounts.
- **Registration**: Enables new users to sign up by providing necessary details.
- **Update Profile**: Users can modify personal and professional details.
- **View Services**: Customers browse available services.
- **Search Services**: Enables users to search and filter based on location, ratings, and pricing.
- **Call for a Tender**: Customers initiate competitive bidding among service providers.
- **Book a Service**: Customers select services, update contact details, and book them.
- **Payment**: Users complete payments through various online methods.
- **Notification**: Alerts users about bookings, payments, and updates.
- **Approve Request**: Service providers accept or decline customer requests.
- **Work Status Update**: Service providers update the status of ongoing jobs.

---

## **Assumptions**
1. **Service Design**: Designed to act as an intermediary, enabling customers to compare and book services from various providers.
2. **Password Policy**: Customers must create strong passwords (alphanumeric with special characters). After five failed attempts, access is temporarily blocked for 15 minutes.
3. **Document Formats**: Service providers must submit documents (PDF < 512KB, JPG images < 512KB) for validation.
4. **Payments**: All payments are digital, and customers are redirected to secure banking portals for transactions.
5. **Support Requests**: Customers can interact with the help desk through a chat system.
6. **Service Provider Verification**: Providers must upload valid documents (e.g., diploma, ID proofs). Approval is handled directly by the company.
7. **Admin Assignment**: Admin assigns the best-rated available service provider to each service request.
8. **No Cash Transactions**: All financial interactions occur through the platform to ensure security and accountability.

---

## **Non-Functional Requirements**
- **COVID Survey**: Mandatory pre-service survey for safety compliance.
- **Notifications**: Real-time updates for customers and service providers.

---

This comprehensive system ensures a seamless experience for all stakeholders while maintaining security, transparency, and efficiency.
