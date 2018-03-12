process:

1.
declaration view
    insert previous values if exists
declaration.save
    insert new declaration
    redirect to summary view
    
2.
summary view
    get declaration item and display
summary.next
    insert new transaction
    save registration_id to session
    redirect to invoice view
    
3.
invoice view
    get registration_id from session
    load invoice item (transaction/registration/user)
    display view
invoice next
    update transaction method
    redirect to thankyou view
    
4.
thankyou view