/// <reference types="cypress" />

describe("register-test", () => {
    it("register new user should be success", () => {
        cy.visit("/register");
        cy.get('input[name="name"]').type("Bagus Rezky");
        cy.get('input[name="email"]').type("bagusrezky@gmail.com");
        cy.get('input[name="password"]').type("password");
        cy.get('button[type="submit"]').click();
    })
});
